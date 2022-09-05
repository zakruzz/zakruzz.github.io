<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TaskEvent extends Model{

    protected $table = 'task_events';
    protected $guarded = [''];

    protected $casts = [
        'type_upload' => 'array'
    ];

//  Relation Has One
    public function event(){
        return $this->hasOne('App\Entities\Event\Event', 'id','event_id');
    }

//  Relation Has Many
    public function taskResponse(){
        return $this->hasMany('App\Entities\Event\TaskResponse', 'task_id');
    }

    public function isTeam(){
        return $this->type == 'TIM';
    }

    public function isIndividu(){
        return $this->type == 'INDIVIDU';
    }

    public static function getTaskByEvent(){

        $user   = Auth::user();

        if($user->participantEvent()->first()){
            return TaskEvent::where('event_id', $user->participantEvent()->first()->event_id);
        }else{
            return NULL;
        }
    }

}
