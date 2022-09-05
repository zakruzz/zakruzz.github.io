<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\RajaOngkirTrait;
use Illuminate\Http\Request;

class RajaOngkir extends Controller{

    use RajaOngkirTrait;

    private $authKey = 'f0729595a08e6b03484d3d2c2b5c76a6';

    public function showCity(Request $request, $province_id){

        $auth = $request->header('Authorization');

        if (!$auth || $auth != $this->authKey){
            abort(404);
        }

        return $this->getCity($province_id);
    }

    public function showDistrict(Request $request, $city_id){

        $auth = $request->header('Authorization');

        if (!$auth || $auth != $this->authKey){
            abort(404);
        }

        return $this->getDistrict($city_id);
    }

    public function showCost($origin, $destination, $weight, $courier){
        return $this->checkCost($origin, $destination, $weight, $courier);
    }

}
