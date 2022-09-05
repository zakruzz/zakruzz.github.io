<?php

namespace App\Entities\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Location;

class Tracker extends Model{

    public function visits(){
        date_default_timezone_set('Asia/Jakarta');

        $date               = date("Y-m-d");
        $time               = date("H:i:s");

        $agent              = new Agent();
        $location           = new Location();


        $check_if_exists    = $this->where(['ip_address' => $_SERVER['REMOTE_ADDR'], 'date_visit' => $date])->first();

        if(!$check_if_exists) {
            $this->insert([
                'ip_address' => $_SERVER['REMOTE_ADDR'],
                'hits' => '1',
                'platform' => $agent->platform(),
                'browser' => $agent->browser(),
                'region' => 0,
                'date_visit' => $date,
                'time_visit' => $time
            ]);
        }else{
            $this->where('ip_address', $_SERVER['REMOTE_ADDR'])->increment('hits');
        }
    }

    public static function getCountDay($date){
       return Tracker::where("date_visit", $date)->count();
    }

    public static function getTotalHitsDay($date){
        return Tracker::where("date_visit", $date)->sum('hits');
    }


}
