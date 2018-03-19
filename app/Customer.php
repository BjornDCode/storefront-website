<?php

namespace App;

use App\License;
use Stripe\Charge;
use Ramsey\Uuid\Uuid;
use App\Mail\LicensePurchased;
use Illuminate\Support\Facades\Mail;
use Stripe\Customer as StripeCustomer;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    protected $guarded = [];

    public static function findOrCreate($email, $token) 
    {
        $customer = Customer::where('email', $email)->first();

        if ($customer) {
            return $customer;
        }

        $stripeCustomer = StripeCustomer::create([
            'email' => $email,
            'source'  => $token
        ]);

        return Customer::create([
            'email' => $email,
            'stripe_id' => $stripeCustomer->id
        ]);
        
    }

    public function purchaseLicense($data) 
    {
        $charge = $this->createCharge();
        $license = $this->createLicense($data, $charge);
        $pdf = $license->generatePdf();
        $this->mailLicense($license, $pdf);
        return $license;
    }

    private function createCharge() 
    {
        return Charge::create([
            'customer' => $this->stripe_id,
            'amount'   => 4900,
            'currency' => 'usd'
        ]);
    }

    private function createLicense($formData, $charge) 
    {
        return License::create([
            'key' => Uuid::uuid4()->toString(),
            'company' => $formData['company'],
            'domain' => $formData['domain'],
            'customer_id' => $charge->customer,
            'transaction_id' => $charge->id
        ]);
    }

    public function mailLicense($license, $pdf) 
    {
        Mail::to($this->email)->send(new LicensePurchased($license, $pdf));
    }

}
