<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Auth\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback(Request $request){
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

                date_default_timezone_set('Asia/Jakarta');
                $finduser->update([
                    'last_login_at' => date('Y-m-d H:i:s'),
                    'last_login_ip' => $request->getClientIp()
                ]);

                return redirect()->route('user.dashboard.main');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('@23#iNF3')
                ]);

                Auth::login($newUser);

                return redirect()->route('user.dashboard.main');
            }

        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['err_msg' => $e->getMessage()]);
        }
    }
}
