<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Socialite; 
use Auth;

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
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function redirectToFacebook() { 
        return Socialite::with('facebook')->redirect(); 
    }

    public function getFacebookCallback() {
         $data = Socialite::with('facebook')->user();
         $user = User::where('email', $data->email)->first(); 
          if(!is_null($user)) {
               Auth::login($user); 
               $user->name = $data->user['name'];
               $user->facebook_id = $data->id;
               $user->save(); 
            } else { $user = User::where('facebook_id', $data->id)->first(); 
                if(is_null($user))
                {  // Create a new user 
                    $user = new User(); 
                    $user->name = $data->user['name'];
                    $user->email = $data->email;
                    $user->facebook_id = $data->id;
                    $user->save(); 
                }   Auth::login($user); 
            } 
            return redirect('/')->with('success', 'Successfully logged in!');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],            
            'phone' => ['required', 'string', 'max:11',  'unique:users'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => ['required', 'string'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'city' => $data['city'],
            'address' => $data['address'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);
    }
}
