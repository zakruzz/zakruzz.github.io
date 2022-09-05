<?php

namespace App\Http\Controllers;

use App\Entities\Core\ConfigurationModel;
use App\Entities\Core\Tracker;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class MaintananceController extends Controller{

    public function __construct(){
        $tracker = new Tracker();
        $tracker->visits();

        View::share('config',ConfigurationModel::find(1));

        Carbon::setLocale('id');
    }

    public function index(){
        return view('maintanance.under-contruction');
    }

    public function comingSoon(){
        $data['config']     = ConfigurationModel::find(1);


        return view('maintanance.coming-soon', $data);
    }
}
