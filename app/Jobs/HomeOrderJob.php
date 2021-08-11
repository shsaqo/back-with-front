<?php

namespace App\Jobs;

use App\Mail\CallBackEmail;
use App\Mail\HomeOrderEmail;
use App\Mail\SendMailOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class HomeOrderJob implements ShouldQueue
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
        Mail::to('t.petrosyan.2020@gmail.com')->send(new HomeOrderEmail($this->request));
        Mail::to('haykpetrosyan7+frn5l7jhldmyvdzaomif@boards.trello.com')->send(new HomeOrderEmail($this->request));
        Mail::to('shirikchyan.sargis@mail.ru')->send(new HomeOrderEmail($this->request));
    }
}
