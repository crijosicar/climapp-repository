<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\CityPersonRepository;

class CityPersonController extends Controller {
        
    private $cityPersonRepository;

    public function __construct(CityPersonRepository $cityPersonRepository) {
        $this->cityPersonRepository = $cityPersonRepository;
    }
    
    public function getAll() {
        $MCityPerson = $this->cityPersonRepository->all();
        return response()->json($MCityPerson, Response::HTTP_OK);
    }

}
