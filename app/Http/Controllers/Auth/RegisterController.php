<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        if ($data['role'] == 'personal') {
            return Validator::make($data, [
                'email' => ['required', 'string', 'email',  'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:10'],
                'role' => ['required', 'string'],
            ]);
        } elseif ($data['role'] == 'student') {
            return Validator::make($data, [
                'user_id' => ['required', 'string', 'max:11'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email',  'max:255', 'unique:users'],
                'phone' => ['required', 'string', 'max:10'],
                'degree' => ['required', 'string', 'max:255'],
                'department' => ['required', 'string', 'max:255'],
                'col_year' => ['required', 'integer'],
                'role' => ['required', 'string'],
            ]);
        } else {
            return print_r('on');
        }
        return print_r('on222222222');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if ($data['role'] == 'student') {
            return User::create([
                'user_id' => $data['user_id'],
                'password' => Hash::make($data['password']),
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'degree' => $data['degree'],
                'department' => $data['department'],
                'col_year' => $data['col_year'],
                'role' => $data['role'],
            ]);
        } elseif ($data['role'] == 'personal') {
            return User::create([
                'user_id' => $data['email'],
                'password' => Hash::make($data['password']),
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'degree' => null,
                'department' => null,
                'col_year' => null,
            ]);
        } else {
            return print_r('on');
        }
        return dd($data);
    }
}
