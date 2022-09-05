<?php

namespace App\Entities\Atrribute;

use Illuminate\Database\Eloquent\Model;

class JobPosition extends Model{

    protected $table = 'job_positions';
    protected $guarded = [''];

//  Relation Has One

    public function user(){
        return $this->hasMany('App\Entities\Auth\User', 'position_id');
    }

}
