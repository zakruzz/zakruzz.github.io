<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;

class TeamInspectionMember extends Model
{
    protected $table = 'team_inspection_members';
    protected $guarded = [''];

    public function team(){
        return $this->hasOne('App\Entities\Event\TeamInspection', 'id','team_id');
    }

    public function participant(){
        return $this->hasOne('App\Entities\Event\ParticipantEvent', 'id','participant_id');
    }

}
