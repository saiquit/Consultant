<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ProjectNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project, $message)
    {
        $this->project = $project;
        $this->message = $message;
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
        $data  = [
            'message' => $this->message,
            'project_name' => $this->project->name,
            'subject'       => $this->message,
        ];
        return (new MailMessage)->from(Env('MAIL_FROM_ADDRESS'))->subject('In response to ' . $this->project->name . ' Notification')->view('mail.project-request-response', compact('data'));
        // ->line('The introduction to the notification.')
        // ->action('Notification Action', url('/'))
        // ->line('Thank you for using our application!');
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
            'type' => 'projects',
            'id'   => $this->project->id,
            'name' => $this->project->name,
            'message' => $this->message
        ];
    }
}
