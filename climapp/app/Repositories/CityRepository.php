<?php namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Validator;
use App\City;

class CityRepository extends Repository {

    public function model() {
        return 'App\City';
    }
    
    public function getCityByName(Request $request) {
        $validator = Validator::make(Input::all(), [ 'cityName' => 'required' ]);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
        $city = new City;
        $city->name = $this->util->removeAccents(Input::get('cityName'));
        $MCity = $this->findWhere([ 'name' => strtoupper($city->name)]);
        return response()->json($MCity, Response::HTTP_OK);
    }
    
}
