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

        $customer = Customer::findOrCreate($data['email'], $data['token']);
        $customer->purchaseLicense($data);

        return 'All Good';
    }

}
