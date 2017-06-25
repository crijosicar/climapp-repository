<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use App\Repositories\PeopleRepository;

class PeopleController extends Controller {

    private $peopleRepository;

    public function __construct(PeopleRepository $peopleRepository) {
        $this->peopleRepository = $peopleRepository;
    }

    public function getAll() {
        $MPerson = $this->peopleRepository->all();
        return response()->json($MPerson, Response::HTTP_OK);
    }

    public function postRegisterNewUser(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                "birth_date" => "required",
                "email" => "required|unique:person",
                "id_born_city" => "required",
                "id_gender" => "required",
                "id_state" => "required",
                "last_name" => "required",
                "name" => "required",
                "phone" => "required",
                "list_frecuent_city" => "required",
                "userDTO" => "required"
            ]);

            if ($validator->fails()) {
                return response()->json($validator->messages(), Response::HTTP_EXPECTATION_FAILED);
            }

            $personDTO = [
                "birth_date" => $request->input('birth_date'),
                "email" => $request->input('email'),
                "id_born_city" => $request->input('id_born_city'),
                "id_gender" => $request->input('id_gender'),
                "id_state" => $request->input('id_state'),
                "last_name" => $request->input('last_name'),
                "name" => $request->input('name'),
                "phone" => $request->input('phone')
            ];

            $MPerson = $this->peopleRepository->postAddNewPeople($personDTO, $request->input('userDTO'), $request->input('list_frecuent_city'));
            if(isset($MPerson['error']) || $MPerson == false){
                return response()->json("Ocurrió un error!.", Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            
            return response()->json($MPerson, Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
