<?php

namespace App\Http\Controllers\Core;


use App\Entities\Content\Slider;
use App\Entities\Content\Sponsor;
use App\Entities\Content\Testimonial;
use App\Entities\Core\ConfigurationModel;

use App\Entities\Core\Tracker;
use App\Entities\Auth\User;

use App\Entities\Event\Event;
use App\Entities\Event\EventFaq;
use App\Entities\Event\ParticipantEvent;
use App\Entities\Event\TeamInspection;
use App\Entities\Event\TeamInspectionMember;
use App\Entities\Merchandise\Product;
use App\Http\Controllers\Controller;
use App\Http\Traits\MailTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class MainController extends Controller{

    use MailTrait;

    public function __construct(){
        $tracker = new Tracker();
        $tracker->visits();

        View::share('config',ConfigurationModel::find(1));
        View::share('event',Event::all());

        Carbon::setLocale('id');
    }

    public function test(){

//        foreach (User::all() as $result){
//            $a = new ParticipantEvent();
//            $a->event_id = 1;
//            $a->user_id = $result->id;
//            $a->status = "ACTIVE";
//            $a->save();
//
//        }

//                $user   = User::where('position', 'PELAJAR SMK')->get();
//
//        foreach ($user as $result){
//
//            $exsistingTeam   = TeamInspection::where('name', $result->institution)->first();
//
//            if ($exsistingTeam){
//
//                $team           = $exsistingTeam;
//
//            }else{
//
//                $team           = new TeamInspection();
//                $team->event_id = 1;
//                $team->name     = $result->institution;
//                $team->school   = $result->institution;
//                $team->save();
//
//            }
//
//
//            $participant            = new ParticipantEvent();
//            $participant->event_id        = 1;
//            $participant->user_id = $result->id;
//            $participant->status = 'AKTIF';
//            $participant->save();
//
//            $member                 = new TeamInspectionMember();
//            $member->team_id        = $team->id;
//            $member->participant_id = $participant->id;
//            $member->is_leader      = 0;
//            $member->save();


            dd(Hash::check('iKuHL0U0', '$2y$10$HzBTYr44PSDIjouvlSBVBOBkVjqr.l9hHcvqU4Qte8lLpDAlmOCHC'));



//        }

    }

    public function index(){
        $data['slider']         = Slider::orderBy('id', 'DESC')->get();
        $data['testimonial']    = Testimonial::all();
        $data['sponsor']        = Sponsor::orderBy('id', 'DESC')->get();

        return view('main.home.index', $data);
    }

    public function about(){
        return view('main.about.index');
    }

    public function testimonial($token){

        if (!$token){
            abort(404);
        }

        if (empty($testi = Testimonial::where('token', $token)->first())){
            abort(404);
        }

        if ($testi->is_filled != 1){
            abort(404);
        }

        $data['data']       = $testi;

        return view('form.testimonial', $data);
    }

    public function testimonialStore($token, Request $request){

        if (!$token){
            abort(404);
        }

        if (empty($testi = Testimonial::where('token', $token)->first())){
            abort(404);
        }

        if ($testi->is_filled != 1){
            abort(404);
        }

        $validator = Validator::make(request()->all(), [
            'fullname' => 'required',
            'institution' => 'required',
            'job_position' => 'required',
            'testimonial' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $testi->fill($request->except([
            'image','is_filled'
        ]));

        $testi->is_filled            = 0;

        $image                      = $request->file('image');

        if ($image){
            $imageName                  = 'TESTI_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/images/testimonial/'), $imageName);
            $testi->image                = $imageName;
        }

        $testi->save();

        alert()->success('Sukses!','Data Berhasil Ditambahkan.');
        return redirect()->route('home');
    }

    public function faq(Request $request){

        if ($request->get('query')){
            $data['data']              = EventFaq::where('question', 'LIKE', "%{$request->get('query')}%")->get();
            $data['query']             = $request->get('query');
        }else{
            $data['data']              = EventFaq::inRandomOrder()->take(4)->get();
            $data['query']             = NULL;
        }

        return view('main.faq.index', $data);
    }

    public function testingMail(){

        $user = User::where('id', 1)->get();

        foreach ($user as $result){

            $result->password = Str::random(8);
            $result->save();

            return $this->sendPassword($result->email, $result->name, $result->password);

        }

    }

}
