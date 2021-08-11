<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    protected $user_name;
    protected $phone;
    protected $url;
    protected $product_name;
    protected $ip_address;
    protected $time;
    protected $order_id;
    protected $custom;

    public function __construct($user_name, $phone, $url, $product_name, $ip_address, $time, $order_id, $custom)
    {
        $this->user_name = $user_name;
        $this->phone = $phone;
        $this->url = $url;
        $this->product_name = $product_name;
        $this->ip_address = $ip_address;
        $this->time = $time;
        $this->order_id = $order_id;
        $this->custom = $custom;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->custom)->
        view('emails.email-order',[
            'user_name' => $this->user_name,
            'phone' => $this->phone,
            'url' => $this->url,
            'product_name' => $this->product_name,
            'ip_address' => $this->ip_address,
            'time' => $this->time,
            'order_id' => $this->order_id
        ]);
    }
}
