<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class TaskResponse extends Model{

    protected $table = 'task_responses';
    protected $guarded = [''];

//  Relation Has One
    public function task(){
        return $this->hasOne('App\Entities\Event\TaskEvent', 'id','task_id');
    }

    public function user(){
        return $this->hasOne('App\Entities\Auth\User', 'id','user_id');
    }

    public function team(){
        return $this->hasOne('App\Entities\Event\TeamInspection', 'id','team_id');
    }

}
