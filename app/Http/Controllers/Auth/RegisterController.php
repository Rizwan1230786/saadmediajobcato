<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;
use App\Http\Requests\Front\UserFrontRegisterFormRequest;
use Illuminate\Auth\Events\Registered;
use App\Events\NewUserRegistered;
use App\Events\UserRegistered;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegisteredMailable;


class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    public function register1(UserFrontRegisterFormRequest $request)
    {
        $dataArr = $request->all();

//        echo json_encode($dataArr);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->is_active = 0;
        $user->verified = 0;
        $user->save();

        $userID = DB::getPdo()->lastInsertId();

//        $user->name = $user->getName();
//        $user->update();


        event(new NewUserRegistered($user));

        $name = $request->input('first_name');
        $email = $request->input('email');



        $messageData = [

            'userID' =>$userID,
            'name' =>$name,
            'email' => $email,
            'link' => route('user.profile', $userID),
            'link_admin' => route('edit.user', ['id' => $userID])

        ];


        Mail::send('emails.user_registered_message', $messageData, function ($message) use ($email) {
            $message->from('sufeelatif@gmail.com', 'sufee Latif');
            $message->subject('Job Seeker ');
            $message->to($email);
            $message->bcc("sufeememon@gmail.com", "sufee mymon");

        });



//        echo "<PRE>";print_r($messageData);exit;

    }


    public function register(UserFrontRegisterFormRequest $request)
    {
        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->middle_name = $request->input('middle_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->is_active = 0;
        $user->verified = 0;
        $user->save();

        $userID = DB::getPdo()->lastInsertId();

                /*         * *********************** */
        $user->name = $user->getName();
        $user->update();
        /*         * *********************** */

//        event(new Registered($user));
//        event(new UserRegistered($user));


        event(new NewUserRegistered($user));

        $name = $request->input('first_name');
        $email = $request->input('email');

//        $messageData = [
//
//            'userID' =>$userID,
//            'name' =>$name,
//            'email' => $email,
//            'link' => route('user.profile', $userID),
//            'link_admin' => route('edit.user', ['id' => $userID])
//
//        ];
//
//
//        Mail::send('emails.user_registered_message', $messageData, function ($message) use ($email) {
//            $message->from('sufeelatif@gmail.com', 'sufee Latif');
//            $message->subject('Job Seeker ');
//            $message->to($email);
//            $message->bcc("sufeememon@gmail.com", "sufee mymon");
//
//        });


//        if (Mail::sent() == 'error') {
//            echo 'Mail not sent';
//        } else {
//            echo 'Mail sent successfully.';
//        }


//        if( count(Mail::failures()) > 0 ) {
//
//            echo "There was one or more failures. They were: <br />";
//
//            foreach(Mail::failures() as $email_address) {
//                echo " - $email_address <br />";
//            }
//
//        } else {
//
//            echo "No errors, all sent successfully!";
//        }
//
//
//            echo "<PRE>";print_r($messageData);exit;




        $this->guard()->login($user);
        UserVerification::generate($user);
        UserVerification::send($user, 'User Verification', config('mail.recieve_to.address'), config('mail.recieve_to.name'));
        return $this->registered($request, $user) ?: redirect($this->redirectPath());


    }

}
