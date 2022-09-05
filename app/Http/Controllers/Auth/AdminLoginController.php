<?php

namespace App\Http\Controllers\Auth;

use App\Entities\Auth\Admin;
use App\Entities\Core\ConfigurationModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Route;

class AdminLoginController extends Controller
{

    public function __construct(){
        View::share('config',ConfigurationModel::find(1));
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('admin.auth.login');
    }

    public function login(Request $request){

        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            Admin::where('email',$request->email)->update([
                'last_login_at' => date('Y-m-d H:i:s'),
                'last_login_ip' => $request->getClientIp()
            ]);
            return redirect()->intended(route('admin.dashboard.main'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
