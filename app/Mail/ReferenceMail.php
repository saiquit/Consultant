<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReferenceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $reference;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reference)
    {
        $this->reference = $reference;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(Env('MAIL_FROM_ADDRESS'), Env('APP_NAME'))->subject($this->reference['subject'])->view('mail.project.reference-mail', ['data' => $this->reference]);
    }
}
