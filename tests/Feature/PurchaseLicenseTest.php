<?php

namespace Tests\Feature;

use Tests\TestCase;
use JacobBennett\StripeTestToken;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PurchaseLicenseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_buy_a_license()
    {
        StripeTestToken::setApiKey(config('services.stripe.secret'));

        $formData = [
            'email' => 'test@example.com',
            'company' => 'Test Company',
            'domain' => 'test.com',
            'token' => StripeTestToken::validVisa()
        ];

        $this->post('/license', $formData);

        $this->assertDatabaseHas('customers', [
            'email' => $formData['email']
        ]);

        $this->assertDatabaseHas('licenses', [
            'company' => $formData['company'],
            'domain' => $formData['domain']
        ]);
    }

    /** @test */
    public function a_user_receives_their_purchased_license_on_email()
    {
        // Given we have a visitor
        // Who buys a license
        // A pdf should be generated with the license
        // The visitor should be emailed the license pdf
    }

    /** @test */
    public function a_user_cannot_buy_a_license_if_they_provide_invalid_card_details()
    {
        
    }

    /** @test */
    public function a_user_cannot_buy_a_license_if_they_provide_invalid_company_details()
    {
        
    }

}
