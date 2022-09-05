<?php

namespace App\Entities\Merchandise;

use Illuminate\Database\Eloquent\Model;

class TransactionCart extends Model{

    protected $table = 'transaction_carts';
    protected $guarded = [''];

//  Relation Has One
    public function transaction(){
        return $this->hasOne('App\Entities\Merchandise\Transaction', 'id','transaction_id');
    }

    public function product(){
        return $this->hasOne('App\Entities\Merchandise\Product', 'id','product_id');
    }

}
