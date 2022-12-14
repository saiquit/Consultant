<?php

namespace App\Listeners;

use App\Mail\WelcomeMail;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class SendNewUserNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // dd($event);
        $admins = User::whereType('admin')->get();
        Mail::to($event->user->email)->send(new WelcomeMail($event->user));
        // Notification::send($admins, new NewUserNotification($event->user));
    }
}
