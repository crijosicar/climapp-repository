<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\ValueListsRepository;

class ValueListsController extends Controller {
    
    private $valueListsRepository;

    public function __construct(ValueListsRepository $valueListsRepository) {
        $this->valueListsRepository = $valueListsRepository;
    }
    
    public function getAll() {
        $MCityPerson = $this->valueListsRepository->all();
        return response()->json($MCityPerson, Response::HTTP_OK);
    }

}
