<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Content\Sponsor;
use App\Entities\Core\ConfigurationModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SponsorController extends Controller{

    public function __construct(){
        View::share('config',ConfigurationModel::find(1));
        $this->middleware('auth:admin');
    }

    public function index(){
        $data['data']               = Sponsor::orderBy('id','DESC')->get();
        return view('admin.sponsor.index',$data);
    }

    public function create(){
        return view('admin.sponsor.content');
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(), [
            'logo' => 'required|image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = new Sponsor();

        $data->fill($request->except([
            'logo'
        ]));

        $image                      = $request->file('logo');

        $imageName                  = 'SPONSOR'.'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
        $image->move(public_path('storage/images/sponsor/'), $imageName);
        $data->logo                 = $imageName;

        $data->save();

        alert()->success('Sukses!','Data Berhasil Ditambahkan.');
        return redirect()->route('admin.sponsor.main');
    }

    public function edit($id){
        if (!$id){
            abort(404);
        }

        $data['data']               = Sponsor::find($id);

        return view('admin.sponsor.content', $data);
    }

    public function update(Request $request, $id){
        if (!$id){
            abort(404);
        }

        $validator = Validator::make(request()->all(), [
            'logo' => 'image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = Sponsor::find($id);

        $data->fill($request->except([
            'logo'
        ]));

        $image                      = $request->file('logo');

        if ($image){
            File::delete(public_path('storage/images/sponsor/').$data->image);
            $imageName                  = 'SPONSOR'.'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/images/sponsor/'), $imageName);
            $data->logo                 = $imageName;
        }else{
            $data->logo                  = $data->logo;
        }

        $data->save();

        alert()->success('Tersimpan!','Data Berhasil Disunting.');
        return redirect()->route('admin.sponsor.main');
    }

    public function delete($id){
        if (!$id){
            abort(404);
        }

        $data                       = Sponsor::find($id);
        File::delete(public_path('storage/images/sponsor/').$data->image);
        $data->delete();

        return redirect()->route('admin.sponsor.main');
    }

}
