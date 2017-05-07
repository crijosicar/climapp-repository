<?php namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Validator;
use App\TUser;

class TUsersRepository extends Repository {
	
	public function model() {
		return 'App\TUser';
	}
	
	public function login(Request $request){
		$validator = Validator::make(Input::all(), TUser::$rules);
		if ($validator->fails()) {
			return $validator->messages();
		}
		$tUser = new TUser;
		$tUser->user_name = Input::get('user_name');
		$tUser->password =  Input::get('password');
		$MUserAuth = $this->findWhere(['user_name' =>  $tUser->user_name, 'password' =>$tUser->password]);
		return $MUserAuth;
	}
	
}
