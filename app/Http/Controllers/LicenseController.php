<?php

namespace App\Http\Controllers;

use App\License;
use App\Customer;
use Stripe\Charge;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Stripe\Customer as StripeCustomer;


class LicenseController extends Controller
{
    
    public function store(Request $request) 
    {
        $data = $request->validate([
            'email' => 'required|email',
            'company' => 'required',
            'domain' => 'required',
            'token' => 'required'
        ]);        

        // Try to get customer from db based on email]
        $customer = Customer::where('email', $data['email'])->first();

        if (!$customer) {
            $customer = StripeCustomer::create([
                'email' => $data['email'],
                'source'  => $data['token']
            ]);

            Customer::create([
                'email' => $data['email'],
                'stripe_id' => $customer->id
            ]);

            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount'   => 4900,
                'currency' => 'usd'
            ));
        } else {
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->stripe_id,
                'amount'   => 4900,
                'currency' => 'usd'
            ));
        }

        $license = License::create([
            'key' => Uuid::uuid4()->toString(),
            'company' => $data['company'],
            'domain' => $data['domain'],
            'customer_id' => $charge->customer,
            'transaction_id' => $charge->id
        ]);

        return 'All Good';
    }

}
