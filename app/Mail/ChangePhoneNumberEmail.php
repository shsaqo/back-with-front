<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChangePhoneNumberEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $phone;
    protected $orderId;

    public function __construct($phone, $orderId)
    {
        $this->phone = $phone;
        $this->orderId = $orderId;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Հեռախոսահամարի փոփոխում:')->view('emails.change-phone-number',[
            'phone' => $this->phone,
            'orderId' => $this->orderId
        ]);
    }
}
