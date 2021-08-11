<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCommentEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->photo) {
            return $this->subject('Comment')
                ->attach(public_path('images/'.$this->photo))
                ->view('emails.send-comment-email',[
                'name' => $this->name,
                'text' => $this->text,
            ]);
        } else {
            return $this->subject('Մեկնաբանություն')->view('emails.send-comment-email',[
                'name' => $this->name,
                'text' => $this->text,
            ]);
        }

    }
}
