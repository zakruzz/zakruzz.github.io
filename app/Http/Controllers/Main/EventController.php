<?php

namespace App\Http\Controllers\Main;

use App\Entities\Atrribute\JobPosition;
use App\Entities\Auth\User;
use App\Entities\Core\ConfigurationModel;
use App\Entities\Core\Tracker;
use App\Entities\Event\Event;
use App\Entities\Event\ParticipantEvent;
use App\Entities\Event\TeamInspection;
use App\Entities\Event\TeamInspectionMember;
use App\Entities\Event\TeamInvitation;
use App\Http\Controllers\Controller;
use App\Http\Traits\DownloadFileTrait;
use App\Http\Traits\MailTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class EventController extends Controller{

    use MailTrait, DownloadFileTrait;

    public function __construct(){
        $tracker = new Tracker();
        $tracker->visits();

        View::share('config',ConfigurationModel::find(1));
        View::share('event',Event::all());

        Carbon::setLocale('id');
    }

    public function index($slug){

        $event                  = Event::getBySlug($slug);

        $data['data']           = $event;
        $data['position']       = JobPosition::all();

        return view('main.event.index', $data);
    }

    public function registration($slug, Request  $request){

        $event                  = Event::getBySlug($slug);

        if ($event->isInspection()){
            if (!Auth::check()) {
                alert()->info('Mohon Maaf!','Untuk melakukan pendaftaran Income diharuskan untuk login terlebih dahulu');
                return redirect()->route('login');
            }
        }

//        if ($request->submit){

            if ($event->isInspection()){

                $validator = Validator::make(request()->all(), [
                    'name_team' => 'required',
                    'email' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => FALSE,
                        'message' => $validator->errors()->first()
                    ]);
                }

                try {
                    $participant            = new ParticipantEvent();
                    $participant->event_id  = $event->id;
                    $participant->user_id   = auth()->user()->id;
                    $participant->save();

                    $team                   = new TeamInspection();
                    $team->event_id         = $event->id;
                    $team->name             = $request->name_team;
                    $team->school           = $request->school;
                    $team->save();

                    $member                 = new TeamInspectionMember();
                    $member->team_id        = $team->id;
                    $member->participant_id = $participant->id;
                    $member->save();

                    if ($request->email_member){
                        foreach ($request->email_member as $i => $member){

                            $invitation                 = new TeamInvitation();
                            $invitation->team_id        = $team->id;
                            $invitation->email          = $member;
                            $invitation->member_order   = $i+1;
                            $invitation->save();

                            $this->sendMailInvitationTeam([
                                "to_name" => '',
                                "to_email" => $member,
                                "subject" => "Undangan Kompetisi ".$event->name." 2022",
                                "link" => Crypt::encryptString($invitation->id),
                                "event" => $event->name
                            ]);

                        }
                    }

                    $this->sendMailGreeting([
                        "to_name" => auth()->user()->name,
                        "to_email" => auth()->user()->email,
                        "subject" => "Pendaftaran ".$event->name." Telah Berhasil",
                        "event" => $event->name
                    ]);

                    return response()->json([
                        'success' => TRUE,
                        'message' => 'Pendaftaran telah berhasil. Mohon tunggu informasi selanjutnya yang akan dikirimkan melalui email'
                    ]);

                }catch (\Exception $exception){
                    return response()->json([
                        'success' => FALSE,
                        'message' => 'Ada kesalahan, mohon cek kembali'. $exception->getMessage()
                    ]);
                }

            }else{
                $validator = Validator::make(request()->all(), [
                    'name' => 'required',
                    'email' => 'required',
                    'phone_number' => 'required',
                    'institution' => 'required',
                    'position_id' => 'required',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'success' => FALSE,
                        'message' => $validator->errors()->first()
                    ]);
                }

                try {
                    $userChecker                = User::where('email',$request->email)->first();

                    if (!$userChecker){
                        $user                   = new User();
                        $user->name             = $request->name;
                        $user->email            = $request->email;
                        $user->institution      = $request->institution;
                        $user->position         = $request->position;
                        $user->password         = encrypt('@23#iNF4');
                        $user->save();
                    }else{
                        $user                   = $userChecker;
                    }

                    $participantChecker         = ParticipantEvent::where([
                            'user_id' => $user->id,
                            'event_id' => $event->id
                        ])->first();

                    if (!$participantChecker){
                        $participant            = new ParticipantEvent();
                        $participant->event_id  = $event->id;
                        $participant->user_id   = $user->id;
                        $participant->save();

                        $this->sendMailGreeting([
                            "to_name" => $user->name,
                            "to_email" => $user->email,
                            "subject" => "Pendaftaran ".$event->name." Telah Berhasil",
                            "event" => $event->name
                        ]);

                        return response()->json([
                            'success' => TRUE,
                            'message' => 'Pendaftaran telah berhasil. Mohon tunggu informasi selanjutnya yang akan dikirimkan melalui email'
                        ]);

                    }else{
                        return response()->json([
                            'success' => FALSE,
                            'message' => 'Anda telah terdaftar di event ini'
                        ]);
                    }


                }catch (\Exception $exception){
                    return response()->json([
                        'success' => FALSE,
                        'message' => 'Ada kesalahan, mohon cek kembali'
                    ]);
                }

            }

            $return                 =  response()->json([
                'success' => TRUE,
                'message' => 'Data berhasil ditambahkan'
            ]);

//        }else{
//            return response()->json([
//                'success' => FALSE,
//                'message' => $request->name
//            ]);
//        }

        return $return;

    }

    public function invitationTeam($token, Request $request){

        $invitation                 = TeamInvitation::getByToken($token);

        if ($invitation->isJoined()){
            abort(404);
        }

        if (!Auth::check()) {
            alert()->info('Mohon Maaf!','Untuk melakukan penerimaan undangan diharuskan untuk login terlebih dahulu');
            return redirect()->route('login');
        }

        if ($invitation->email != auth()->user()->email){
            abort(404);
        }

        if ($request->submit){

            $invitation->is_joined  = 1;
            $invitation->save();

            $participant            = new ParticipantEvent();
            $participant->event_id  = $invitation->team->event_id;
            $participant->user_id   = auth()->user()->id;
            $participant->save();

            $team                   = $invitation->team;

            $member                 = new TeamInspectionMember();
            $member->team_id        = $team->id;
            $member->participant_id = $participant->id;
            $member->save();

            $this->sendMailGreeting([
                "to_name" => auth()->user()->name,
                "to_email" => auth()->user()->email,
                "subject" => "Pendaftaran Inspection Telah Berhasil",
                "event" =>"Inspection"
            ]);

            alert()->success('Sukses!','Pendaftaran Telah Berhasil. Nantikan informasi selanjutnya di email anda');
            $return                 = redirect()->route('home');
        }else{
            $data['token']          = $token;
            $data['data']           = $invitation;
            $return                 = view('main.event.invitation-team',$data);
        }

        return $return;

    }

    public function download($slug){
        if (!$slug){
            abort(404);
        }

        try {
            $data                       = Event::getBySlug($slug);

            $path                       = 'storage/files/guidebook/';
            $fileName                   = $data->guidebook;

            return $this->getDownload($path, $fileName);
        }catch (\Exception $exception){
            return abort(404);
        }


    }

}
