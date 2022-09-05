<?php

namespace App\Http\Controllers\Admin\Merchandise;

use App\Entities\Core\ConfigurationModel;
use App\Entities\Merchandise\Product;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class ProductController extends Controller{

    public function __construct(){
        View::share('config',ConfigurationModel::find(1));
        $this->middleware('auth:admin');
    }

    public function index(){
        $data['data']               = Product::orderBy('id','DESC')->get();
        return view('admin.product.index',$data);
    }

    public function create(){
        return view('admin.product.content');
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = new Product();

        $data->fill($request->except([
            'image','slug'
        ]));

        $data->slug                 = Str::slug($request->name, '-');

        $image                      = $request->file('image');
        $imageName                  = $data->slug.'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
        $image->move(public_path('storage/images/product/'), $imageName);
        $data->image                = $imageName;

        $data->save();

        alert()->success('Sukses!','Data Berhasil Ditambahkan.');
        return redirect()->route('admin.product.main');
    }

    public function edit($id){
        if (!$id){
            abort(404);
        }

        $data['data']               = Product::find($id);

        return view('admin.product.content', $data);
    }

    public function update(Request $request, $id){
        if (!$id){
            abort(404);
        }

        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:5000',
        ]);

        if ($validator->fails()) {
            alert()->error('Opss..', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data                       = Product::find($id);

        $data->fill($request->except([
            'image','slug'
        ]));

        $data->slug                 = Str::slug($request->name, '-');

        $image                      = $request->file('image');

        if ($image){
            File::delete(public_path('storage/images/product/').$data->image);
            $imageName                  = $data->slug.'_'.date("Ymd_His").'.'.$image->getClientOriginalExtension();
            $image->move(public_path('storage/images/product/'), $imageName);
            $data->image                = $imageName;
        }else{
            $data->image                = $data->image;
        }

        $data->save();

        alert()->success('Tersimpan!','Data Berhasil Disunting.');
        return redirect()->route('admin.product.main');
    }

    public function delete($id){
        if (!$id){
            abort(404);
        }

        $data                       = Product::find($id);
        File::delete(public_path('storage/images/product/').$data->image);
        $data->delete();

        return redirect()->route('admin.product.main');
    }

}
