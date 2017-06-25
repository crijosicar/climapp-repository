<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Hash;
use App\TUser;
use App\UserAccess;
use App\Common\ConstantUtil as States;

class TUsersRepository extends Repository {

    public function model() {
        return 'App\TUser';
    }

    public function login(Request $request) {
        try {
            $tUser = TUser::where('user_name', $request->input('user_name'))->first();
            if ($tUser != NULL) {
                if (Hash::check($request->input('password'), $tUser->getPasswordAttribute())) {
                    $apikey = base64_encode(str_random(30));
                    $authTUser = TUser::find($tUser->getIdAttribute());
                    $authTUser->setApiTokenAttribute($apikey);
                    if ($authTUser->save()) {
                        UserAccess::where('id_user', '=', $authTUser->getIdAttribute())
                        ->where('state_login', '=', States::STATE_LOGIN_ACTIVE)
                        ->where('state_token', '=', States::STATE_TOKEN_ACTIVE)
                        ->update([
                            'state_login' => States::STATE_LOGIN_INACTIVE, 
                            'state_token' => States::STATE_TOKEN_INACTIVE
                        ]);
                        $userAccess = new UserAccess;
                        $userAccess->setIdUserAttribute($authTUser->getIdAttribute());
                        $userAccess->setLoginDateAttribute($authTUser->getUpdatedAtAttribute());
                        $userAccess->setStateLoginAttribute(States::STATE_LOGIN_ACTIVE);
                        $userAccess->setStateTokenAttribute(States::STATE_TOKEN_ACTIVE);
                        $userAccess->setTokenAttribute($authTUser->getApiTokenAttribute());
                        if($userAccess->save()){
                            return ["token" => $authTUser->getApiTokenAttribute()];
                        } else {
                            return NULL;
                        }
                    } else {
                        return NULL;
                    }
                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
        } catch (Exception $e) {
            return NULL;
        }
    }

    public function loginByUser(TUser $tUser) {
        try {
            $apikey = base64_encode(str_random(30));
            $authTUser = TUser::find($tUser->getIdAttribute());
            $authTUser->setApiTokenAttribute($apikey);
            if ($authTUser->save()) {
                UserAccess::where('id_user', '=', $authTUser->getIdAttribute())
                ->where('state_login', '=', States::STATE_LOGIN_ACTIVE)
                ->where('state_token', '=', States::STATE_TOKEN_ACTIVE)
                ->update([
                    'state_login' => States::STATE_LOGIN_INACTIVE, 
                    'state_token' => States::STATE_TOKEN_INACTIVE
                ]);
                $userAccess = new UserAccess;
                $userAccess->setIdUserAttribute($authTUser->getIdAttribute());
                $userAccess->setLoginDateAttribute($authTUser->getUpdatedAtAttribute());
                $userAccess->setStateLoginAttribute(States::STATE_LOGIN_ACTIVE);
                $userAccess->setStateTokenAttribute(States::STATE_TOKEN_ACTIVE);
                $userAccess->setTokenAttribute($authTUser->getApiTokenAttribute());
                if($userAccess->save()){
                    return ["token" => $authTUser->getApiTokenAttribute()];
                } else {
                    return NULL;
                }
            } else {
                return NULL;
            }
        } catch (Exception $e) {
            return NULL;
        }
    }

}
