<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class TeamInspection extends Model{

    protected $table = 'team_inspections';
    protected $guarded = [''];

//  Relation Has One
    public function event(){
        return $this->hasOne('App\Entities\Event\Event', 'id','event_id');
    }

    public function member(){
        return $this->hasMany('App\Entities\Event\TeamInspectionMember', 'team_id','id');
    }

}
