<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Env;

class ProjectRequestResponse extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $message;
    public $project;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message, $project)
    {
        $this->message = $message;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data  = [
            'message' => $this->message,
            'project_name' => $this->project->name,
            'subject'   => auth()->user()->isAdmin() ? 'A response to ' . $this->project->name . ' Request.' : auth()->user()->name . 'is refering you ' . $this->project->name,
        ];
        return $this->from(Env('MAIL_FROM_ADDRESS'))->subject(auth()->user()->isAdmin() ? 'A response to ' . $this->project->name . ' Request.' : auth()->user()->name . 'is refering you ' . $this->project->name)->view('mail.project-request-response', compact('data'));
    }
}
