<?php

namespace App\Http\Controllers\Core;

use App\Entities\Auth\User;
use App\Entities\Content\Slider;
use App\Entities\Core\ConfigurationModel;
use App\Entities\Event\Event;
use App\Entities\Event\ParticipantEvent;
use App\Entities\Event\TaskEvent;
use App\Entities\Event\TeamInspection;
use App\Entities\Event\TeamInspectionMember;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class UserController extends Controller{

    public function __construct(){
        $this->middleware('auth');

        View::share('config',ConfigurationModel::find(1));
        View::share('user',Auth::user());

        date_default_timezone_set('Asia/Jakarta');
    }

    public function dashboard(){


        if ($team = Auth::user()->getTeamInspection()){
            $data['participant']        = $team;
            $data['event']              = $team->event;
        }

        $data['participant']        = NULL;

        $data['invitation']             = Auth::user()->teamInvitationNotJoined()->get();

        $data['task']                   = TaskEvent::getTaskByEvent() ? TaskEvent::getTaskByEvent()->where('status', 'AKTIF')->orderBy('id', 'DESC')->get() : NULL ;

        return view('user.dashboard.index',$data);
    }

    public function profile(){
        return view('user.profile.index');
    }

    public function updateProfile(Request $request){
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'phone_number' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = User::find(auth()->user()->id);
        $data->name                 = $request->name;
        $data->phone_number         = $request->phone_number;
        $data->save();

        alert()->success('Sukses!','Profil Berhasil Disunting.');
        return redirect()->route('user.profile.main');
    }

    public function updatePassword(Request $request){
        $validator = Validator::make(request()->all(), [
            'password' => 'required|min:8',
            'password_confirm' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        if ($request->password == $request->password_confirm){
            $data                       = User::find(auth()->user()->id);
            $data->password             = Hash::make($request->password);
            $data->save();

            alert()->success('Sukses!','Password Berhasil Disunting.');
            return redirect()->route('user.profile.main');
        }else{
            alert()->error('Opss..', "Konfirmasi password tidak sesuai");
            return redirect()->back()->withInput();
        }

    }

}
