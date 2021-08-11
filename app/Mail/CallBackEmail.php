<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CallBackEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $phone;
    protected $url;

    public function __construct($phone, $url)
    {
        $this->phone = $phone;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Հետ զանգի պատվեր')->view('emails.email-call-back',[
            'phone' => $this->phone,
            'url' => $this->url
        ]);
    }
}
