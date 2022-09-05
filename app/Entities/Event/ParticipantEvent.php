<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class ParticipantEvent extends Model{

    protected $table = 'participant_events';
    protected $guarded = [''];

//  Relation Has One
    public function event(){
        return $this->hasOne('App\Entities\Event\Event', 'id','event_id');
    }

    public function user(){
        return $this->hasOne('App\Entities\Auth\User', 'id','user_id');
    }

//  Relation Has Many
    public function taskResponse(){
        return $this->hasMany('App\Entities\Event\TaskResponse', 'participant_id');
    }

//  Status Checker
    public function isPending(){
        return $this->status == 'pending';
    }

    public function isActive(){
        return $this->status == 'active';
    }

    public function isBlocked(){
        return $this->status == 'blocked';
    }

}
