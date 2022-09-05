<?php

namespace App\Entities\Merchandise;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{

    protected $table = 'products';
    protected $guarded = [''];

    public function priceFormat(){
        return 'Rp. '.number_format($this->price,'0',' ','.');
    }

    public static function getBySlug($slug){

        if (!Product::where('slug', $slug)->first()){
            abort(404);
        }

        return Product::where('slug', $slug)->first();
    }

}
