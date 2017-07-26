<?php

namespace App\Http\Controllers;

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
        return response()->json($MCity, Response::HTTP_OK);
    }

    public function getAllCitiesList() {
        try {
            $MCitiesList = $this->cityRepository->all(['id', 'value']);
            return response()->json($MCitiesList, Response::HTTP_OK);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function getAllCitiesFromLA() {
        $this->cityRepository->pushCriteria(new CitiesFromLA());
        $MCity = $this->cityRepository->all();
        return response()->json($MCity, Response::HTTP_OK);
    }

    public function getCityById(Request $request, $id) {
        $fieldsDTO = count($request->json()->all()) > 0 ? $request->json()->all() : ['*'];
        $MCity = $this->cityRepository->find($id, $fieldsDTO);
        return response()->json($MCity, Response::HTTP_OK);
    }

    public function getCityByCityName(Request $request) {
        $validator = Validator::make(Input::all(), ['cityName' => 'required']);
        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
        }
        $MCity = $this->cityRepository->getCityByName($request);
        return response()->json($MCity, Response::HTTP_OK);
    }

    public function getCityByLatitude($latitude) {
        $validator = Validator::make(Input::all(), ['cityName' => 'required']);
        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
        }
        $MCity = $this->cityRepository->findAllBy('latitude', $latitude);
        return response()->json($MCity, Response::HTTP_OK);
    }

    public function addNewCity(Request $request) {
        $validator = Validator::make(Input::all(), City::$rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
        }
        $MCity = $this->cityRepository->create($request->all());
        return response()->json($MCity, Response::HTTP_OK);
    }

    public function updateCityById(Request $request, $id) {
        $validator = Validator::make(Input::all(), City::$rules);
        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
        }
        $MCity = $this->cityRepository->update($request->all(), $id);
        return response()->json($MCity, Response::HTTP_OK);
    }

}
