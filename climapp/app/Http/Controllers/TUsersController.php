<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\TUsersRepository;
use App\Common\Util;

class TUsersController extends Controller {
	
	private $tUsersRepository;
	private $util;
	
	public function __construct(TUsersRepository $tUsersRepository, Util $util) {
		$this->tUsersRepository = $tUsersRepository;
		$this->util = $util;
	}
	
	public function getAll() {
		$MUserAuth = $this->tUsersRepository->all();
		return response()->json($MUserAuth, Response::HTTP_OK);
	}
	
	public function userAuth(Request $request) {
        $MUserAuth = $this->tUsersRepository->login($request);
		return response()->json($MUserAuth, Response::HTTP_OK);
	}
	
}
