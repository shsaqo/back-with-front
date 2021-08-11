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

class SendCommentEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $name;
    protected $text;
    protected $photo;


    public function __construct($name, $text, $photo)
    {
        $this->name = $name;
        $this->text = $text;
        $this->photo = $photo;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        Mail::to('shirikchyan.sargis@mail.ru')->send(new \App\Mail\SendCommentEmail($this->name, $this->text, $this->photo));
        Mail::to('t.petrosyan.2020@gmail.com')->send(new \App\Mail\SendCommentEmail($this->name, $this->text, $this->photo));
        Mail::to('haykpetrosyan7+1l391n4pydbakf7alyy9@boards.trello.com')->send(new \App\Mail\SendCommentEmail($this->name, $this->text, $this->photo));
        Mail::to('haykpetrosyan7+jr7goi77qwjsq1crmucx@boards.trello.com')->send(new \App\Mail\SendCommentEmail($this->name, $this->text, $this->photo));
    }
}
