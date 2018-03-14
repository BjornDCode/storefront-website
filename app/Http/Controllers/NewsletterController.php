<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    
    public function subscribe(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        return response('Subscribed!', 200);
    }

}
