<?php

namespace App\Jobs;

use App\Mail\CallBackEmail;
use App\Mail\ChangePhoneNumberEmail;
use App\Mail\SendMailOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ChangePhoneNumberJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
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
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('t.petrosyan.2020@gmail.com')->send(new ChangePhoneNumberEmail($this->phone, $this->orderId));
        Mail::to('haykpetrosyan7+1l391n4pydbakf7alyy9@boards.trello.com')->send(new ChangePhoneNumberEmail($this->phone, $this->orderId));
        Mail::to('haykpetrosyan7+jr7goi77qwjsq1crmucx@boards.trello.com')->send(new ChangePhoneNumberEmail($this->phone, $this->orderId));
    }
}
