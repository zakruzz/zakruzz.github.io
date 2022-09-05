<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Content\Testimonial;
use App\Entities\Core\ConfigurationModel;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class TestimonialController extends Controller{

    public function __construct(){
        View::share('config',ConfigurationModel::find(1));
        $this->middleware('auth:admin');
    }

    public function index(){
        $data['data']               = Testimonial::orderBy('id','DESC')->get();
        return view('admin.testimonial.index',$data);
    }

    public function store(){
        $token                       = Str::random(100);

        $data                        = new Testimonial();
        $data->token                 = $token;
        $data->is_filled             = '1';

        $data->save();

        alert()->success('Sukses!','Data Berhasil Ditambahkan.');
        return redirect()->route('admin.testimonial.main');
    }

    public function edit($id){
        if (!$id){
            abort(404);
        }

        $data['data']               = Testimonial::find($id);

        return view('admin.testimonial.content', $data);
    }

    public function update(Request $request, $id){
        if (!$id){
            abort(404);
        }

        $data                       = Testimonial::find($id);

        $data->fill($request->all());
        $data->save();

        alert()->success('Tersimpan!','Data Berhasil Disunting.');
        return redirect()->route('admin.testimonial.main');
    }

    public function delete($id){
        if (!$id){
            abort(404);
        }

        $data                       = Testimonial::find($id);
        $data->delete();

        return redirect()->route('admin.testimonial.main');
    }

}
