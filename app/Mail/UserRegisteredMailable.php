<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisteredMailable extends Mailable
{

    use Queueable,SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        echo "HERE";exit;

//        echo $this->user;exit;

        return $this->to(config('mail.recieve_to.address'), config('mail.recieve_to.name'))
                        ->subject('Job Seeker "' . $this->user->name . '" has been registered on "' . config('app.name'))
                        ->view('emails.user_registered_message')
                        ->with(
                                [
                                    'name' => $this->user->name,
                                    'email' => $this->user->email,
                                    'link' => route('user.profile', $this->user->id),
                                    'link_admin' => route('edit.user', ['id' => $this->user->id])
                                ]
        );
    }

}
