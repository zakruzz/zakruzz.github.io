<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Auth\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /* Add This in AuthenticatesUsers line 34
     * $getAccount = User::where('email', $request->email)->first();
        if ($getAccount){
            if ($getAccount->linkedWithGoogle()){
                return redirect()->back()->withErrors(['err_msg' => 'Silahkan mencoba login dengan Google']);
            }
        }
     */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request, $user){
        date_default_timezone_set('Asia/Jakarta');
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $request->getClientIp()
        ]);
        return redirect(session('link'));
    }


}
