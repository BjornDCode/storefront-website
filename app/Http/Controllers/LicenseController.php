<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Stripe\Error\{Card, RateLimit, InvalidRequest, Authentication, ApiConnection, Base};


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

        try {
            $customer = Customer::findOrCreate($data['email'], $data['token']);
            $license = $customer->purchaseLicense($data);
        } catch(Card $e) {
            return response($e->jsonBody['error'], $e->httpStatus);
        } catch (RateLimit $e) {
            return response($e->jsonBody['error'], $e->httpStatus);
        } catch (InvalidRequest $e) {
            return response($e->jsonBody['error'], $e->httpStatus);
        } catch (Authentication $e) {
            return response($e->jsonBody['error'], $e->httpStatus);
        } catch (ApiConnection $e) {
            return response($e->jsonBody['error'], $e->httpStatus);
        } catch (Base $e) {
            return response($e->jsonBody['error'], $e->httpStatus);
        } catch (Exception $e) {
            return response('Something went wrong.', 400);
            // return something went wrong
        }

        return $license;
    }

}
