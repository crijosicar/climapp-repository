<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Repositories\ValueListsRepository;
use App\ValueList;

class ValueListsController extends Controller {
    
    private $valueListsRepository;

    public function __construct(ValueListsRepository $valueListsRepository) {
        $this->valueListsRepository = $valueListsRepository;
    }
    
    public function getAll() {
        $MValueList = $this->valueListsRepository->all();
        return response()->json($MValueList, Response::HTTP_OK);
    }

    public function getAllValuesByCategoryList($category) {
        try{
            $validator = Validator::make(['category' => $category], ['category' => 'required']);
            if ($validator->fails()) {
                return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
            }
            $MValueList = $this->valueListsRepository->findAllBy('category', $category, ['id', 'description']);
            return response()->json($MValueList, Response::HTTP_OK);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function addNewValueList(Request $request) {
        $validator = Validator::make(Input::all(), ValueList::$rules);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
        $MValueList = $this->valueListsRepository->create($request->all());
        return response()->json($MValueList, Response::HTTP_OK);
    }

    public function findByCategory($category) {
        try{
            $validator = Validator::make(['category' => $category], ['category' => 'required']);
            if ($validator->fails()) {
                return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
            }
            $MValueList = $this->valueListsRepository->getValueListByCategory($category);
            return response()->json($MValueList, Response::HTTP_OK);
        } catch(Exception $e){
            dd($e);
        }
    } 

}
