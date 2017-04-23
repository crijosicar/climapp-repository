<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\City;

class CityController extends Controller {

    const MODEL = "App\City";

    use RESTActions;

    function customQuery($id){
    	$city = City::where('name', '=', "hola")->take(10)->get();
    	if(is_null($city)){
    		return response()->json($city, Response::HTTP_NOT_FOUND);
        }
        return response()->json($city, Response::HTTP_OK);
    }

    function eloquentQuery($id){
    	$city = City::findOrFail($id);
    	if(is_null($city)){
    		return response()->json($city, Response::HTTP_NOT_FOUND);
        }
        return response()->json($city, Response::HTTP_OK);
    }
}
