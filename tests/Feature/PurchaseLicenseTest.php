<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Mail\LicensePurchased;
use JacobBennett\StripeTestToken;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
        Mail::fake();
        Storage::fake('local');

        StripeTestToken::setApiKey(config('services.stripe.secret'));

        $formData = [
            'email' => 'test@example.com',
            'company' => 'Test Company',
            'domain' => 'test.com',
            'token' => StripeTestToken::validVisa()
        ];

        $response = $this->post('/license', $formData);

        Mail::assertSent(LicensePurchased::class, function($mail) use ($formData) {
            return $mail->hasTo($formData['email']);
        });
    }

    /** @test */
    public function a_user_cannot_buy_a_license_if_they_provide_invalid_company_details()
    {
        StripeTestToken::setApiKey(config('services.stripe.secret'));

        $formData = [
            'email' => 'test@example.com',
            'domain' => 'test.com',
            'token' => StripeTestToken::validVisa()
        ];

        $this->post('/license', $formData);

        $this->assertDatabaseMissing('customers', [
            'email' => $formData['email']
        ]);

        $this->assertDatabaseMissing('licenses', [
            'domain' => $formData['domain']
        ]);
    }

    /** @test */
    public function a_user_cannot_buy_a_license_if_they_provide_an_invalid_payment_token()
    {
        StripeTestToken::setApiKey(config('services.stripe.secret'));

        $formData = [
            'email' => 'test@example.com',
            'company' => 'Test Company',
            'domain' => 'test.com',
            'token' => StripeTestToken::declineCard()
        ];

        $response = $this->post('/license', $formData);

        $this->assertDatabaseMissing('customers', [
            'email' => $formData['email']
        ]);

        $this->assertDatabaseMissing('licenses', [
            'domain' => $formData['domain']
        ]);
    }

}
