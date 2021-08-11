<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

class ApiSendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $request;
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('t.petrosyan.2020@gmail.com')->send(new \App\Mail\ApiSendMail($this->request));
//        Mail::to('haykpetrosyan7+1l391n4pydbakf7alyy9@boards.trello.com')->send(new \App\Mail\ApiSendMail($this->request));
//        Mail::to('haykpetrosyan7+jr7goi77qwjsq1crmucx@boards.trello.com')->send(new \App\Mail\ApiSendMail($this->request));
        Mail::to('haykpetrosyan7+frn5l7jhldmyvdzaomif@boards.trello.com')->send(new \App\Mail\ApiSendMail($this->request));
    }
}
