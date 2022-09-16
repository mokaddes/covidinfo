<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PatientReportUpdateMail extends Mailable
{
    use Queueable, SerializesModels;
    public $mails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mails)
    {
        $this->mails = $mails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail from Patient Report')->view('emails.patientreportmail');
    }
}
