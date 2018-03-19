<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;

class LicensePurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $license;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($license, $pdf)
    {
        $this->license = $license;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Storefront License')
                    ->attachData($this->pdf, 'license.pdf', [
                        'mime' => 'application/pdf',
                    ])
                    ->markdown('emails.licensePurchased');
    }
}
