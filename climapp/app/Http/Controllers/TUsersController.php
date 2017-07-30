<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use App\Repositories\TUsersRepository;
use App\TUser;

class TUsersController extends Controller {

    private $tUsersRepository;

    public function __construct(TUsersRepository $tUsersRepository) {
        $this->tUsersRepository = $tUsersRepository;
    }

    public function getAll() {
        $MUserAuth = $this->tUsersRepository->all();
        return response()->json($MUserAuth, Response::HTTP_OK);
    }

    public function userAuth(Request $request) {
        
        $user_name = Input::get('user_name');
        $user_name = Str::lower($user_name);
        Input::merge(['user_name' =>$user_name]);
        $validator = Validator::make(Input::all(), [
                    "password" => "required",
                    "user_name" => "required",
        ]);
       
        if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_EXPECTATION_FAILED);
        }

        $MUserAuth = $this->tUsersRepository->login($request);

        if (isset($MUserAuth['error'])) {
            return response()->json($MUserAuth['error'], Response::HTTP_NOT_ACCEPTABLE);
        }

        return response()->json($MUserAuth, Response::HTTP_OK);
    }

    public function getUserToken(TUser $tUser) {

        $MUserAuth = $this->tUsersRepository->loginByUser($tUser);

        if (isset($MUserAuth['error'])) {
            return response()->json($MUserAuth['error'], Response::HTTP_NOT_ACCEPTABLE);
        }

        return response()->json($MUserAuth, Response::HTTP_OK);
    }

}
