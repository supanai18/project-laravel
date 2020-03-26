<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Auth;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
        $userSocial = Socialite::driver('google')->user();
        $finduser = User::where('provider_id', $userSocial->id)->first();
        if($finduser) {
            Auth::login($finduser);
            return redirect('/');
        } else {
            $check_email = User::where('email', $userSocial->email)->get();
            if(!$check_email) {
                $new_user = User::create([
                    'name' => $userSocial->name,
                    'email' => $userSocial->email,
                    'password' => Hash::make($userSocial->token),
                    'provider_id' => $userSocial->id,
                    'provider' => 'google',
                    'status' => 'member',
                    'avatar' => $userSocial->avatar,
                ]);
                Auth::login($new_user);
                return redirect('/');
            } else {
                return redirect('/login')->with('failed', 'Account Google ของท่านถูกใช้งานแล้ว กรุณาใช้บัญชีอื่น');
            }
        }
    }
}
