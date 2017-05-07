<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Illuminate\Support\Facades\Input;
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
		$validator = Validator::make(Input::all(), TUser::$rules);
		if ($validator->fails()) {
            return response()->json($validator->messages(), Response::HTTP_EXPECTATION_FAILED);
		}
        $MUserAuth = $this->tUsersRepository->login($request);
		return response()->json($MUserAuth, Response::HTTP_OK);
	}
	
}
