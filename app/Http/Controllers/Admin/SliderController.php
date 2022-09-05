<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Content\Slider;
use App\Entities\Core\ConfigurationModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class SliderController extends Controller{

    public function __construct(){
        View::share('config',ConfigurationModel::find(1));
        $this->middleware('auth:admin');
    }

    public function index(){
        $data['data']               = Slider::orderBy('id','DESC')->get();
        return view('admin.slider.index',$data);
    }

    public function create(){
        return view('admin.slider.content');
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = new Slider();

        $data->fill($request->except([
            'image'
        ]));

        $image                      = $request->file('image');

        $imageName                  = 'SLIDER'.'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
        $image->move(public_path('storage/images/slider/'), $imageName);
        $data->image                = $imageName;

        $data->save();

        alert()->success('Sukses!','Data Berhasil Ditambahkan.');
        return redirect()->route('admin.slider.main');
    }

    public function edit($id){
        if (!$id){
            abort(404);
        }

        $data['data']               = Slider::find($id);

        return view('admin.slider.content', $data);
    }

    public function update(Request $request, $id){
        if (!$id){
            abort(404);
        }

        $validator = Validator::make(request()->all(), [
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = Slider::find($id);

        $data->fill($request->except([
            'image'
        ]));

        $image                      = $request->file('image');

        if ($image){
            File::delete(public_path('storage/images/slider/').$data->image);
            $imageName                  = 'SLIDER'.'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/images/slider/'), $imageName);
            $data->image                = $imageName;
        }else{
            $data->image                = $data->image;
        }

        $data->save();

        alert()->success('Tersimpan!','Data Berhasil Disunting.');
        return redirect()->route('admin.slider.main');
    }

    public function delete($id){
        if (!$id){
            abort(404);
        }

        $data                       = Slider::find($id);
        File::delete(public_path('storage/images/slider/').$data->image);
        $data->delete();

        return redirect()->route('admin.slider.main');
    }

}
