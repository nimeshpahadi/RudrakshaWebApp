<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
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
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'contact' => 'integer',
            'alternative_contact' => 'integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),

        ]);
    }

    /**
     * Customize user create
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $input = $request->all();

        $this->validator($input)->validate();

        $data = $this->create($input)->toArray();
        $data['token'] = str_random(25);

        $user = User::find($data['id']);
        $user->token = $data['token'];
        $user->save();

        Mail::send('mails.confirmation', $data, function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('Registration Confirmation');
        });

        return redirect(route('login'))->with('status', 'Confirmation email has been send. please check your email.');
    }

    /**
     * Confirm user for login after register
     *
     * @param $token
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirmation($token)
    {
        $user = User::where('token', $token)->first();
        if (!is_null($user)) {
            $user->confirmed = 1;
            $user->token = null;
            $user->save();

            return redirect(route('login'))->with('status', 'Your activation is completed.');
        }

        return redirect(route('login'))->with('warning', 'Something went wrong.');
    }
}