<?php

namespace App\Entities\Auth;

use App\Entities\Event\TaskEvent;
use App\Entities\Event\TaskResponse;
use App\Entities\Event\TeamInspectionMember;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'last_login_at',
        'last_login_ip',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

//  Relation Has One
    public function jobPosition(){
        return $this->hasOne('App\Entities\Attribute\JobPosition', 'id','position_id');
    }

//  Relation Has Many
    public function participantEvent(){
        return $this->hasMany('App\Entities\Event\ParticipantEvent', 'user_id');
    }

    public function taskResponse(){
        return $this->hasMany('App\Entities\Event\TaskResponse', 'user_id');
    }

    public function teamInvitationNotJoined(){
        return $this->hasMany('App\Entities\Event\TeamInvitation', 'email' ,'email')->where('is_joined',0);
    }

//  Func

    public function getTeamInspection(){

        $participant    = $this->participantEvent()->where('event_id', 1)->first();

        if ($participant){
            $team           = TeamInspectionMember::where('participant_id', $participant->id)->first();

            return $team->team;
        }else{
            return NULL;
        }

    }

    public function getMemberTeamInspection(){

        $participant    = $this->participantEvent()->where('event_id', 1)->first();

        if ($participant){
            $member         = TeamInspectionMember::where('participant_id', $participant->id)->first();

            return $member;
        }else{
            return NULL;
        }

    }

    public function checkTask($id){

        $task   = TaskEvent::find($id);


        if ($task->type == 'INDIVIDU'){
            $return = TaskResponse::where(['task_id' => $task->id, 'user_id' => auth()->user()->id])->first();
        }elseif ($task->type == 'TIM'){
            $return = TaskResponse::where(['task_id' => $task->id, 'team_id' => $this->getTeamInspection()->id])->first();
        }else{
            $return = FALSE;
        }

        return $return;

    }

    public function checkApprovedTask($id){

        $task   = TaskEvent::find($id);

        if ($task->type == 'INDIVIDU'){
            $return = TaskResponse::where(['task_id' => $task->id, 'user_id' => auth()->user()->id, 'status' => 'DITERIMA'])->first();
        }elseif ($task->type == 'TIM'){
            $return = TaskResponse::where(['task_id' => $task->id, 'team_id' => $this->getTeamInspection()->id, 'status' => 'DITERIMA'])->first();
        }else{
            $return = FALSE;
        }

        return $return;

    }


    public function linkedWithGoogle(){
        return $this->google_id;
    }

    public function newAccount(){
        return $this->phone_number == null;
    }

    public function isContestant(){
        return $this->is_contestant == 1;
    }

}
