<?php

namespace App\Http\Controllers;

use Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    
    public function subscribe(Request $request) 
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        Newsletter::subscribeOrUpdate($data['email'], [ 'NAME' => $data['name'] ], 'newsletter');

        if (Newsletter::getLastError()) {
            return response("It was not possible to subscribe you at this time", 422);
        }

        return response('Subscribed!', 200);
    }

}
