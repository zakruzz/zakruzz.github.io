<?php

namespace App\Entities\Merchandise;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model{

    protected $table = 'transactions';
    protected $guarded = [''];

//  Relation Has Many
    public function cart(){
        return $this->hasMany('App\Entities\Content\TransactionCart', 'transaction_id');
    }

}
