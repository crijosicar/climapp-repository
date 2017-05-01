<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\UserAccessesRepository;


class UserAccessesController extends Controller {

    private $userAccessesRepository;

    public function __construct(UserAccessesRepository $userAccessesRepository) {
        $this->userAccessesRepository = $userAccessesRepository;
    }
    
    public function getAll() {
        $MCityPerson = $this->userAccessesRepository->all();
        if(is_null($MCityPerson)){
            return response()->json($MCityPerson, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCityPerson, Response::HTTP_OK);
    }
    
}
