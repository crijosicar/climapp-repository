<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\ValueListRespository;

class ValueListsController extends Controller {
    
    private $valueListRespository;

    public function __construct(ValueListRespository $valueListRespository) {
        $this->valueListRespository = $valueListRespository;
    }
    
    public function getAll() {
        $MCityPerson = $this->valueListRespository->all();
        if(is_null($MCityPerson)){
            return response()->json($MCityPerson, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCityPerson, Response::HTTP_OK);
    }

}
