<?php

namespace App\Http\Controllers\Core;

use App\Entities\Auth\Admin;
use App\Entities\Core\ConfigurationModel;
use App\Entities\Core\Tracker;
use App\Entities\Auth\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class AdminController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');

        View::share('config',ConfigurationModel::find(1));

        date_default_timezone_set('Asia/Jakarta');
    }

    public function dashboard(){
        return view('admin.dashboard.index');
    }

//    ========================================== USERS ==========================================

    public function users(){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $data['data'] = User::all();
        return view('admin.user.index',$data);
    }

    public function deleteUser($id){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        if ($id == null){
            abort(404);
        }

        $data = User::find($id);

        if ($data == null){
            abort(404);
        }

        $data->delete();

        return redirect()->back();

    }

//    ========================================== USERS ==========================================

    public function admin(){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $data['data'] = Admin::all();
        return view('admin.admin.index',$data);
    }

    public function storeAdmin(Request $request){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back();
        }

        $data                   = new Admin();
        $data->name             = $request->name;
        $data->email            = $request->email;
        $data->password         = Hash::make($request->password);
        $data->role             = $request->role;
        $data->save();

        alert()->success('Saved','Admin has been created');
        return redirect()->back();
    }

    public function deleteAdmin($id){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        if ($id == null){
            abort(404);
        }

        $data = Admin::find($id);

        if ($data == null){
            abort(404);
        }

        $data->delete();

        return redirect()->back();

    }

//    ========================================== CONFIGURATION ==========================================

    public function configuration(){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $data['configuration']      = ConfigurationModel::find(1);
        return view('admin.configuration.index',$data);
    }

    public function updateConfig(Request $request){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'logo' => 'image|mimes:png|max:1000',
            'logo_white' => 'image|mimes:png|max:1000',
            'icon' => 'image|mimes:png|max:1000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back();
        }

        $data                       = ConfigurationModel::find(1);
        $data->title_website        = $request->title;

        $logo       = $request->file('logo');
        $logo_white = $request->file('logo_white');
        $icon       = $request->file('icon');


        if ($logo){
            File::delete(public_path('storage/images/logo/').$data->logo);
            $logoName                   = 'LOGO'.'_'.date("Ymd_His").'.png';
            $logo->move(public_path('storage/images/logo/'), $logoName);
            $data->logo                 = $logoName;
        }else{
            $data->logo                 = $data->logo;
        }

        if ($logo_white){
            File::delete(public_path('storage/images/logo/').$data->logo_white);
            $logoWhiteName              = 'LOGO_WHITE'.'_'.date("Ymd_His").'.png';
            $logo_white->move(public_path('storage/images/logo/'), $logoWhiteName);
            $data->logo_white           = $logoWhiteName;
        }else{
            $data->logo_white           = $data->logo_white;

        }

        if ($icon){
            File::delete(public_path('storage/images/logo/').$data->icon);
            $iconName                   = 'ICON'.'_'.date("Ymd_His").'.png';
            $icon->move(public_path('storage/images/logo/'), $iconName);
            $data->icon                 = $iconName;
        }else{
            $data->icon                 = $data->icon;
        }

        $data->email                = $request->email;
        $data->phone_number         = $request->phone;
        $data->address_address      = $request->address_address;
        $data->address_latitude     = $request->address_latitude;
        $data->address_longitude    = $request->address_longitude;

        $data->save();

        alert()->success('Saved','Your Configuration Has Been Updated.');
        return redirect(route('admin.config.main'));

    }

    public function updateConfigAbout(Request $request){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $validator = Validator::make(request()->all(), [
            'link_youtube' => 'required',
            'description' => 'required',
            'short_description' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back();
        }

        $data                       = ConfigurationModel::find(1);
        $data->youtube_link         = $request->link_youtube;
        $data->about_us             = $request->description;
        $data->about_short          = $request->short_description;

        $data->save();

        alert()->success('Saved','Your Configuration Has Been Updated.');
        return redirect(route('admin.config.main'));

    }

    public function updateConfigMeta(Request $request){

//        if (Auth::user()->role != 'superadmin'){
//            abort(404);
//        }

        $validator = Validator::make(request()->all(), [
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back();
        }

        $data                       = ConfigurationModel::find(1);
        $data->meta_keywords        = $request->meta_keywords;
        $data->meta_description     = $request->meta_description;

        $data->save();

        alert()->success('Saved','Your Configuration Has Been Updated.');
        return redirect(route('admin.config.main'));

    }

//    ========================================== VISITOR STATISTICS ==========================================

    public function statistics(){

        $dataTracker    = [];
        $dataVisitor    = [];
        $dataHits       = [];
        $dataDate       = [];
        $month          = date("m");
        $year           = date("Y");

        for($d=1; $d<=31; $d++) {
            $time=mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time)==$month)
                $dataTracker[]=[
                    "date" => date('d', $time),
                    "visitor" => Tracker::getCountDay(date('Y-m-d', $time)),
                    "hits" => Tracker::getTotalHitsDay(date('Y-m-d', $time))
                ];
        }

        foreach ($dataTracker as $value){
            $dataVisitor[]=$value['visitor'];
            $dataHits[]=$value['hits'];
            $dataDate[]=$value['date'];
        }

        $data['month']              = date("F Y");
        $data['query']              = date("m-Y");
        $data['date']               = $dataDate;
        $data['hits']               = $dataHits;
        $data['visitor']            = $dataVisitor;
        return view('admin.statistics.index',$data);
    }

    public function statisticsFilter(Request $request){

        if ($request->date  == null){
            abort(404);
        }

        $dataTracker    = [];
        $dataVisitor    = [];
        $dataHits       = [];
        $dataDate       = [];

        $date           = explode('-',$request->date);

        $month          = $date[0];
        $year           = $date[1];

        for($d=1; $d<=31; $d++) {
            $time=mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time)==$month)
                $dataTracker[]=[
                    "date" => date('d', $time),
                    "visitor" => Tracker::getCountDay(date('Y-m-d', $time)),
                    "hits" => Tracker::getTotalHitsDay(date('Y-m-d', $time))
                ];
        }

        foreach ($dataTracker as $value){
            $dataVisitor[]=$value['visitor'];
            $dataHits[]=$value['hits'];
            $dataDate[]=$value['date'];
        }

        $data['month']              = Carbon::parse("01-".$request->date)->format('F Y');
        $data['query']              = $request->date;
        $data['date']               = $dataDate;
        $data['hits']               = $dataHits;
        $data['visitor']            = $dataVisitor;
        return view('admin.statistics.index',$data);
    }

//    ========================================== POP UP ==========================================

    public function popup(){
        $data['data']               = ConfigurationModel::find(1);
        return view('admin.modal.index',$data);
    }

    public function updatePopup(Request $request){
        $validator = Validator::make(request()->all(), [
            'image' => 'image|mimes:png,jpg,jpeg|max:1000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back();
        }

        $data                       = ConfigurationModel::find(1);

        $image                      = $request->file('image');
        if ($image != null){
            File::delete(public_path('assets/image/popup/').$data->image);
            $imageName              = "POPUP".'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
            $image->move(public_path('assets/image/popup/'), $imageName);
            $data->modal_image      = $imageName;
        }else{
            $data->modal_image      = $data->modal_image;
        }

        $data->save();

        alert()->success('Saved','Your Data Has Been Updated.');
        return redirect()->back();
    }

    public function updatePopupStatus(Request $request){
        $data                       = ConfigurationModel::find(1);
        $data->modal_status         = $data->modal_status == 'active' ? 'disable' : 'active';
        $data->save();

        alert()->success('Saved','Status has been updated');
        return redirect()->back();

    }

//    ========================================== MESSAGES ==========================================

    public function messages(){
        $data['data']               = Messages::orderBy('id','DESC')->get();
        return view('admin.messages.index', $data);
    }

    public function detailMessages($id){

        if ($id == null){
            abort(404);
        }

        $aspiration                 = Messages::find($id);
        $aspiration->status         = 0;
        $aspiration->save();

        $data['data']               = $aspiration;

        return view('admin.messages.content', $data);
    }

    public function deleteMessages($id){

        if ($id == null){
            abort(404);
        }

        $data                       = Messages::find($id);
        $data->delete();

        return redirect()->back();
    }

}
