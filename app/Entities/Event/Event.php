<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class Event extends Model{

    protected $table = 'events';
    protected $guarded = [''];

//  Relation Has Many
    public function timeline(){
        return $this->hasMany('App\Entities\Event\EventTimeline', 'event_id');
    }

    public function faq(){
        return $this->hasMany('App\Entities\Event\EventFaq', 'event_id');
    }

    public function participant(){
        return $this->hasMany('App\Entities\Event\ParticipantEvent', 'event_id');
    }

    public function team(){
        return $this->hasMany('App\Entities\Event\TeamInspection', 'event_id');
    }

    public function task(){
        return $this->hasMany('App\Entities\Event\TaskEvent', 'event_id');
    }

    public function announcement(){
        return $this->hasMany('App\Entities\Event\Announcement', 'event_id');
    }

//  Custom Func
    public function hasChildren(){
        return $this->has_children == 1;
    }

    public function isInspection(){
        return $this->id == 1 || $this->id == 2;
    }

    public function registrationOpen(){
        return $this->status == 'OPEN';
    }

    public static function getBySlug($slug){

        if ($slug){
            $data   = Event::where('slug', $slug)->first();
            if (!$data){
                return abort(404);
            }
        }else{
            return abort(404);
        }

        return $data;
    }

}
