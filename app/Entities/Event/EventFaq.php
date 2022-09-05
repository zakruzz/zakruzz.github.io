<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class EventFaq extends Model{

    protected $table = 'event_faqs';
    protected $guarded = [''];

//  Relation Has One
    public function event(){
        return $this->hasOne('App\Entities\Event\Event', 'id','event_id');
    }

}
