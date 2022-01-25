<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Carbon\Carbon;;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SellerMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('auth.sellerMail')
            ->with('emailData', $this->emailData)->delay(Carbon::now()->addSeconds(10));
    }
}