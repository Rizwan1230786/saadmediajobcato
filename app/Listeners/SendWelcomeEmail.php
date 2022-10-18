<?php

namespace App\Listeners;

use App\Events\NewUserRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmail
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
     * @param  NewUserRegistered  $event
     * @return void
     */

    public function handle(NewUserRegistered $event)
    {
        //send the welcome email to the user
        $user = $event->user;

        $messageData = [

            'name' => $user->name,
            'email' => $user->email,
            'link' => route('user.profile', $user->id),
            'link_admin' => route('edit.user', ['id' => $user->id])

        ];

//        echo "<PRE>";print_r($messageData);exit;


        Mail::send('emails.user_registered_message', $messageData, function ($message) use ($user) {
            $message->from('hi@yourdomain.com', 'John Doe');
            $message->subject('Welcome aboard '.$user->name.'!');
            $message->to($user->email);
            $message->bcc("sufeememon@gmail.com", "sufee mymon");

        });
    }

}
