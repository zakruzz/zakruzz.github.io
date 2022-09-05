<?php

namespace App\Http\Controllers\Admin\Intshow;

use App\Entities\Core\ConfigurationModel;
use App\Entities\Event\ParticipantEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ParticipantController extends Controller{

    private $eventId    = '3';
    private $eventName  = 'Intshow';

    public function __construct(){
        $this->middleware('auth:admin');

        View::share('config',ConfigurationModel::find(1));

        date_default_timezone_set('Asia/Jakarta');
    }

    public function index(){
        $data['event']      = $this->eventName;
        $data['data']       = ParticipantEvent::where('event_id', $this->eventId)->get();
        return view('admin.event-participant.index', $data);
    }

}
