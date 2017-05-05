<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Repositories\CityRepository;
use App\Repositories\Criteria\Cities\CitiesFromLA;
use App\Common\Util;
use App\City;

class CityController extends Controller {
    
    private $cityRepository;
    private $util;
    
    public function __construct(CityRepository $cityRepository, Util $util) {
        $this->cityRepository = $cityRepository;
        $this->util = $util;
    }
    
    public function getAll() {
        $MCity = $this->cityRepository->all();
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function getAllCitiesFromLA() {
        $this->cityRepository->pushCriteria(new CitiesFromLA());
        $MCity = $this->cityRepository->all();
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function getCityById(Request $request, $id) {
        $fieldsDTO = count($request->json()->all()) > 0 ? $request->json()->all() : ['*'];
        $MCity = $this->cityRepository->find($id, $fieldsDTO);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function getCityByCityName(Request $request) {
        $cityDTO = $request->json()->all();

        $validator = Validator::make(Input::all(), [ 'cityName' => 'required' ]);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}

        $cityName = strtoupper($this->util->removeAccents($cityDTO['cityName'])); 
        $MCity = $this->cityRepository->findWhere([ 'name' => $cityName ]);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function getCityByLatitude($latitude) {
        $validator = Validator::make(Input::all(), [ 'cityName' => 'required' ]);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
        $MCity = $this->cityRepository->findAllBy('latitude', $latitude);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function addNewCity(Request $request){
        $validator = Validator::make(Input::all(), TUser::$rules);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
        $MCity = $this->cityRepository->create($request->all());
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function updateCityById(Request $request, $id){
        $validator = Validator::make(Input::all(), TUser::$rules);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
        $MCity = $this->cityRepository->update($request->all(), $id);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
}
