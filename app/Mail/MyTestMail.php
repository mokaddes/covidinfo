<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $mails;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mails,$data)
    {
        $this->mails = $mails;
        $this->data = $data;

        // dd($this->data);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('Mail from Covid Test')
                    ->view('emails.myTestMail')
                    ->attachData($this->mails['attach']->output(), $this->mails['name'], [
                    'mime' => 'application/pdf',
                ]);
        // return $this->subject('Mail from Covid Test')
        //             ->view('emails.myTestMail');

    }
}
