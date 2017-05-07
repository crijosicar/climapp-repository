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
		return response()->json($MCityPerson, Response::HTTP_OK);
	}
	
	public function userAuth(Request $request) {
        $validator = Validator::make(Input::all(), TUser::$rules);
		if ($validator->fails()) {
			return response()->json($validator->messages(), Response::HTTP_NOT_FOUND);
		}
        $tUser = new TUser;
        $tUser->user_name = Input::get('user_name');
		$tUser->password =  Input::get('password');
		$MUserAuth = $this->tUsersRepository->findWhere(['user_name' =>  $tUser->user_name, 'password' =>$tUser->password]);
		return response()->json($MUserAuth, Response::HTTP_OK);
	}
	
}
