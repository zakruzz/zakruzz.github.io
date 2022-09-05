<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class EventTimeline extends Model{

    protected $table = 'event_timelines';
    protected $guarded = [''];

//  Relation Has One
    public function event(){
        return $this->hasOne('App\Entities\Event\Event', 'id','event_id');
    }

    public function isActive(){
        return $this->is_active == 1;
    }

}
