<?php

namespace App\Listeners;

//use Mail;
use Illuminate\Support\Facades\Mail;
use App\Events\UserRegistered;
use App\Mail\UserRegisteredMailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class UserRegisterdListener implements ShouldQueue
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
     * @param  CompanyRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {

//        echo "<PRE>";print_r($event->user);exit;

//        Mail::send(new UserRegisteredMailable($event->user));

        //send the welcome email to the user

        $user = $event->user;

        Mail::to($user->email)->send(new UserRegisteredMailable($event->user));

//        echo $user->name;
//        echo "<PRE>";print_r($user);exit;

        $messageData = [

            'name' => $user->name,
            'email' => $user->email,
            'link' => route('user.profile', $user->id),
            'link_admin' => route('edit.user', ['id' => $user->id])

        ];

//        echo "<PRE>";print_r($messageData);exit;


        Mail::send('emails.user_registered_message', $messageData, function ($message) use ($user) {
            $message->from('sufeelatif@gmail.com', 'sufee Latif');
            $message->subject('Job Seeker "' . $user->name . '" has been registered on "' . config('app.name'));
            $message->to($user->email);
            $message->bcc("sufeememon@gmail.com", "sufee mymon");

        });






    }

}
