<?php

namespace App\Entities\Event;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class TeamInvitation extends Model{

    protected $table = 'team_invitations';
    protected $guarded = [''];

//  Relation Has One
    public function team(){
        return $this->hasOne('App\Entities\Event\TeamInspection', 'id','team_id');
    }

//  Func
    public function isJoined(){
        return $this->is_joined == 1;
    }

    public static function getByToken($token){

        if ($token){
            $data   = TeamInvitation::find(Crypt::decryptString($token));
            if (!$data){
                return abort(404);
            }
        }else{
            return abort(404);
        }

        return $data;
    }

}
