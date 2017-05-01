<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\TUsersRepository;

class TUsersController extends Controller {
    
    private $tUsersRepository;

    public function __construct(TUsersRepository $tUsersRepository) {
        $this->tUsersRepository = $tUsersRepository;
    }
    
    public function getAll() {
        $MCityPerson = $this->tUsersRepository->all();
        if(is_null($MCityPerson)){
            return response()->json($MCityPerson, Response::HTTP_NOT_FOUND);
        }
        return response()->json($MCityPerson, Response::HTTP_OK);
    }

}
