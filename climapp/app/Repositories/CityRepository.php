<?php namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use App\Common\Util;
use App\City;

class CityRepository extends Repository {

    public function model() {
        return 'App\City';
    }
    
    public function getCityByName(Request $request) {
        $city = new City;
        $util = new Util();
        $city->name = $util->removeAccents(Input::get('cityName'));
        $MCity = $this->findWhere([ 'name' => strtoupper($city->name)]);
        return $MCity;
    }
    
}
