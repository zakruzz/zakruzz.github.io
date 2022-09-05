<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model{

    protected $table = 'announcements';
    protected $guarded = [''];

//  Relation Has One
    public function event(){
        return $this->hasOne('App\Entities\Event\Event', 'id','event_id');
    }

}
