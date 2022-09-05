<?php

namespace App\Http\Controllers\Admin\Task;

use App\Entities\Core\ConfigurationModel;
use App\Entities\Event\Event;
use App\Entities\Event\TaskEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use function abort;
use function auth;
use function redirect;
use function request;
use function response;
use function route;
use function view;

class TaskController extends Controller{

    public function __construct(){
        $this->middleware('auth:admin');

        View::share('config',ConfigurationModel::find(1));

        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        $data['data']               = TaskEvent::orderBy('id','DESC')->get();
        return view('admin.event-task.index',$data);
    }

    public function create(){
        $data['event']              = Event::all();
        return view('admin.event-task.content', $data);
    }

    public function store(Request $request){
        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required',
            'type_upload' => 'required',
            'deadline' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            $data                       = new TaskEvent();

            $data->fill($request->except([
                'type_upload', 'created_by'
            ]));

            $data->type_upload          = $request->type_upload;
            $data->created_by           = auth()->user()->id;
            $data->save();

            return response()->json([
                'success' => TRUE,
                'message' => 'Data berhasil ditambahkan',
                'url' => route('admin.event-task.main')
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'success' => FALSE,
                'message' => 'Ada kesalahan, mohon cek kembali'. $exception
            ]);
        }
    }

    public function edit($id){
        if (!$id){
            abort(404);
        }

        $data['data']               = TaskEvent::find($id);
        $data['event']              = Event::all();
        return view('admin.event-task.content', $data);
    }

    public function update(Request $request, $id){
        if (!$id){
            abort(404);
        }

        $validator = Validator::make(request()->all(), [
            'title' => 'required',
            'description' => 'required',
            'type_upload' => 'required',
            'deadline' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        try {
            $data                       = TaskEvent::find($id);

            $data->fill($request->except([
                'type_upload'
            ]));

            $data->type_upload          = $request->type_upload;
            $data->save();

            return response()->json([
                'success' => TRUE,
                'message' => 'Data berhasil disunting',
                'url' => route('admin.event-task.main')
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'success' => FALSE,
                'message' => 'Ada kesalahan, mohon cek kembali'. $exception
            ]);
        }
    }

    public function delete($id){
        if (!$id){
            abort(404);
        }

        $data                       = TaskEvent::find($id);
        $data->delete();

        return redirect()->back();
    }

}
