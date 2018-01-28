<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
        session(['auth_sess' => 1]);
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        session(['auth_sess' => 1]);
        return Validator::make($data, [
            'fname'     =>  'required|string|max:255',
            'lname'     =>  'required|string|max:255',
            'email'     =>  'required|string|email|max:255|unique:users',
            'password'  =>  'required|string|min:6|confirmed',
            'gender'    =>  'required|boolean',
            'username'  =>  'required|unique:users',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $image = "img/defaults/avatars/default-female.jpg";
        if($data['gender']) {
            $image = "img/defaults/avatars/default-male.jpg";
        }
        $user = User::create([
            'fname'     =>  $data['fname'],
            'lname'     =>  $data['lname'],
            'email'     =>  $data['email'],
            'password'  =>  bcrypt($data['password']),
            'gender'    =>  $data['gender'],
            'username'  =>  $data['username'],
            'image'     =>  $image
        ]);
            
        //event(new \App\Events\AccountActivationEvent($user));
        //event(new \App\Events\NewRegistrationEvent($user));

        if($user):
            \App\Profile::firstOrCreate([
                'user_id'   =>  $user->id,
            ]);
    
            \App\Social::firstOrCreate([
                'user_id'   =>  $user->id,
            ]);

            \App\User::find($user->id)->notify(new \App\Notifications\NewAccount($user));

            return $user;
        else:
            abort(501);
        endif;
    }

    public function verifyUsername(Request $request) {
        $slug = $request->slug;
        $verify_slug = 1;
        $slugs = \App\User::where('username', $slug)->first();
        if(count($slugs) > 0) {
            $verify_slug = 0;
        }
        return $verify_slug;
    }
}
