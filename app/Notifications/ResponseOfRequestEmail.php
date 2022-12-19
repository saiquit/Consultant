<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResponseOfRequestEmail extends Notification implements ShouldQueue
{
    use Queueable;
    public $project;
    public $message;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, $message, $user)
    {
        $this->project = $project;
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $data  = ['message' => $this->message,
        'project_name' => $this->project->name];
        return (new MailMessage)->from(Env('MAIL_FROM_ADDRESS'))->subject('In response to '. $this->project->name . ' request')->view('mail.project-request-response', compact('data'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type'      => 'email',
            'project_id' => $this->project->id,
            'user_id' => $this->user->id,
            'project_name' => $this->project->name,
            'message' => $this->message,
        ];
    }
}
