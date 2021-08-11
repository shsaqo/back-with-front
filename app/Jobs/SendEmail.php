<?php

namespace App\Jobs;

use App\Mail\SendMailOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $tries = 3;
    public $retryAfter = 50;

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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('shirikchyan.sargis@mail.ru')->send(new SendMailOrder($this->user_name, $this->phone, $this->url, $this->product_name, $this->ip_address, $this->time, $this->order_id, $this->custom));
        Mail::to('t.petrosyan.2020@gmail.com')->send(new SendMailOrder($this->user_name, $this->phone, $this->url, $this->product_name, $this->ip_address, $this->time, $this->order_id, $this->custom));
        Mail::to('haykpetrosyan7+frn5l7jhldmyvdzaomif@boards.trello.com')->send(new SendMailOrder($this->user_name, $this->phone, $this->url, $this->product_name, $this->ip_address, $this->time, $this->order_id, $this->custom));

//        Mail::to('haykpetrosyan7+1l391n4pydbakf7alyy9@boards.trello.com')->send(new SendMailOrder($this->user_name, $this->phone, $this->url, $this->product_name, $this->ip_address, $this->time, $this->order_id, $this->custom));
//        Mail::to('haykpetrosyan7+jr7goi77qwjsq1crmucx@boards.trello.com')->send(new SendMailOrder($this->user_name, $this->phone, $this->url, $this->product_name, $this->ip_address, $this->time, $this->order_id, $this->custom));
    }
}
