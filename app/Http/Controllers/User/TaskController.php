<?php

namespace App\Http\Controllers\User;

use App\Entities\Core\ConfigurationModel;
use App\Entities\Event\TaskEvent;
use App\Entities\Event\TaskResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class TaskController extends Controller{

    public function __construct(){
        $this->middleware('auth');

        View::share('config',ConfigurationModel::find(1));

        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){

        $data['data']   = TaskEvent::getTaskByEvent()->where('status', 'AKTIF')->orderBy('id', 'DESC')->get();
        return view('user.task.index', $data);
    }

    public function completed(){

        $data['data']   = TaskEvent::getTaskByEvent()->orderBy('id', 'DESC')->get();
        return view('user.task.index', $data);
    }

    public function store(Request $request, $id){
        if (!$id){
            abort(404);
        }

        try {

            $task                       = TaskEvent::find($id);
            $user                       = Auth::user();

            $typeUpload                 = implode(',', $task->type_upload);

            $validator = Validator::make(request()->all(), [
                'file' => "required|mimes:$typeUpload|max:100000",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => FALSE,
                    'message' => $validator->errors()->first()
                ]);
            }

            $data                       = new TaskResponse();
            $data->task_id              = $task->id;
            $data->user_id              = $user->id;

            if ($task->type == 'TIM'){
                $data->team_id              = $user->getTeamInspection()->id;
            }

            $file                       = $request->file('file');
            $fileName                   = Str::slug($user->name, '-').'_'.date("Ymd-His").'.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/files/submission/'), $fileName);
            $data->file                 = $fileName;

            $data->save();

            return response()->json([
                'success' => TRUE,
                'message' => 'Submission berhasil terkirim',
                'url' => route('user.task.main')
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'success' => FALSE,
                'message' => 'Ada kesalahan, mohon cek kembali'. $exception
            ]);
        }
    }

    public function edit(Request $request, $id){
        if (!$id){
            abort(404);
        }

        try {

            $data                       = TaskResponse::find($id);

            $task                       = $data->task;
            $user                       = Auth::user();

            $typeUpload                 = implode(',', $task->type_upload);

            $validator = Validator::make(request()->all(), [
                'file' => "required|mimes:$typeUpload|max:100000",
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'success' => FALSE,
                    'message' => $validator->errors()->first()
                ]);
            }


            $data->task_id              = $task->id;
            $data->user_id              = $user->id;

            File::delete(public_path('storage/files/submission').$data->file);

            $file                       = $request->file('file');
            $fileName                   = Str::slug($user->name, '-').'_'.date("Ymd-His").'.'.$file->getClientOriginalExtension();
            $file->move(public_path('storage/files/submission/'), $fileName);
            $data->file                 = $fileName;

            $data->save();

            return response()->json([
                'success' => TRUE,
                'message' => 'Submission berhasil tersunting',
                'url' => route('user.task.main')
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'success' => FALSE,
                'message' => 'Ada kesalahan, mohon cek kembali'. $exception
            ]);
        }
    }

}
