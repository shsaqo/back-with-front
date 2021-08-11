<?php

namespace App\Jobs;

use App\Mail\CallBackEmail;
use App\Mail\SendMailOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class CallBackPhoneJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('t.petrosyan.2020@gmail.com')->send(new CallBackEmail($this->phone, $this->url));
        Mail::to('haykpetrosyan7+frn5l7jhldmyvdzaomif@boards.trello.com')->send(new CallBackEmail($this->phone, $this->url));
        Mail::to('shirikchyan.sargis@mail.ru')->send(new CallBackEmail($this->phone, $this->url));
    }
}
