<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Input;
use App\Repositories\TUsersRepository;
use App\Common\Util;
use App\TUser;

class TUsersController extends Controller {
	
	private $tUsersRepository;
	private $util;
	
	public function __construct(TUsersRepository $tUsersRepository, Util $util) {
		$this->tUsersRepository = $tUsersRepository;
		$this->util = $util;
	}
	
	public function getAll() {
		$MUserAuth = $this->tUsersRepository->all();
		if(is_null($MCityPerson)){
			return response()->json($MCityPerson, Response::HTTP_NOT_FOUND);
		}
		return response()->json($MCityPerson, Response::HTTP_OK);
	}
	
	public function userAuth(Request $request) {
		$userAuthDTO = $request->json()->all();
        $validator = Validator::make(Input::all(), TUser::$rules);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
		$MUserAuth = $this->tUsersRepository->findWhere(['user_name' => $userAuthDTO['user_name'], 'password' => $userAuthDTO['password']]);
		if(is_null($MUserAuth)){
			return response()->json($MUserAuth, Response::HTTP_NOT_FOUND);
		}
		return response()->json($MUserAuth, Response::HTTP_OK);
	}
	
}
