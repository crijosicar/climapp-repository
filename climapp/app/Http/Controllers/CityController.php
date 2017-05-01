<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\CityRepository;
use App\Repositories\Criteria\Cities\CitiesFromLA;

class CityController extends Controller {
    
    private $cityRepository;
    
    public function __construct(CityRepository $cityRepository) {
        $this->cityRepository = $cityRepository;
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
        $fields = count($request->json()->all()) > 0 ? $request->json()->all() : ['*'];
        $MCity = $this->cityRepository->find($id, $fields);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function getCityByCityName($cityName) {
        $city = strtoupper($cityName);
        $MCity = $this->cityRepository->findWhere([ 'name' => $city ]);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function getCityByLatitude($latitude) {
        $MCity = $this->cityRepository->findAllBy('latitude', $latitude);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function addNewCity(Request $request){
        $MCity = $this->cityRepository->create($request->all());
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
    
    public function updateCityById(Request $request, $id){
        $MCity = $this->cityRepository->update($request->all(), $id);
        if(is_null($MCity)){
            return response()->json($MCity, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCity, Response::HTTP_OK);
    }
}
