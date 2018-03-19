<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;


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
        $license = $customer->purchaseLicense($data);

        return $license;
    }

}
