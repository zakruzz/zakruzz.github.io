<?php

namespace App\Http\Controllers\Admin\Task;

use App\Entities\Core\ConfigurationModel;
use App\Entities\Event\Event;
use App\Entities\Event\TaskEvent;
use App\Entities\Event\TaskResponse;
use App\Http\Controllers\Controller;
use App\Http\Traits\DownloadFileTrait;
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

class TaskResponseController extends Controller{

    use DownloadFileTrait;

    public function __construct(){
        $this->middleware('auth:admin');

        View::share('config',ConfigurationModel::find(1));

        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        $data['data']               = TaskResponse::orderBy('id','DESC')->get();
        return view('admin.event-task-reponse.index',$data);
    }

    public function detail($id){
        $data['data']               = TaskResponse::find($id);
        return view('admin.event-task-reponse.content',$data);
    }


    public function updateStatus(Request $request, $id, $status){
        if (!$id){
            abort(404);
        }

        if (!$status){
            abort(404);
        }

        try {
            $data                       = TaskResponse::find($id);

            if ($status == 'DITERIMA'){
                $data->status_reason        = '';
            }else{
                $data->status_reason        = $request->reason;
            }

            $data->status               = $status;
            $data->save();

            return response()->json([
                'success' => TRUE,
                'message' => "Penugasan berhasil disunting ke $status",
            ]);

        }catch (\Exception $exception){
            return response()->json([
                'success' => FALSE,
                'message' => 'Ada kesalahan, mohon cek kembali'. $exception
            ]);
        }
    }

    public function download($id){
        if (!$id){
            abort(404);
        }

        try {
            $data                       = TaskResponse::find($id);

            $path                       = 'storage/files/submission/';
            $fileName                   = $data->file;

            return $this->getDownload($path, $fileName);
        }catch (\Exception $exception){
            return abort(404);
        }

    }

}
