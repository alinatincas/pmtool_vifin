<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
     *
     * @return void
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
            //'name' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'pay' => ['required', 'integer'],
            'dep_name' => ['required', 'string'],
            'pos_name' => ['required', 'string'],
            'phone_no' => ['required', 'string'],
            //'user_img' => ['image|required|mimes:jpg,jpeg'],
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
        /*  $user_img = time() . '.' . $data['user_img']->getClientOriginalExtension();
        $data['user_img']->move(base_path() . '/public/upload/', $user_img); */
        return User::create([
            //'name' => $data['name'],
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'pay' => $data['pay'],
            'dep_name' => $data['dep_name'],
            'pos_name' => $data['pos_name'],
            'phone_no' => $data['phone_no'],
            //'user_img' => $data['user_img'],

            /* 
            
            'active' => $data['active'],
            
            'usertype' => Config::get('constants.ROLE_USER'), */
            'password' => Hash::make($data['password']),

        ]);
    }
}