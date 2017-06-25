<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Hash;
use App\Person;
use App\TUser;
use App\CityPerson;
use App\UserAccess;
use App\Common\ConstantUtil as States;

class PeopleRepository extends Repository {

    public function model() {
        return 'App\Person';
    }
    
    /**
     * Save a new user.
     *
     * @param  array  $person
     * @param  array  $user
     * @param  array  $frecuentCities
     * @return string token
     */
    public function postAddNewPeople($person, $user, $frecuentCities) {
        try {
            $nPerson = new Person;
            $nPerson->setBirthDateAttribute($person['birth_date']);
            $nPerson->setEmailAttribute($person['email']);
            $nPerson->setIdBornCityAttribute($person['id_born_city']);
            $nPerson->setIdGenderAttribute($person['id_gender']);
            $nPerson->setIdStateAttribute($person['id_state']);
            $nPerson->setLastNameAttribute($person['last_name']);
            $nPerson->setNameAttribute($person['name']);
            $nPerson->setPhoneAttribute($person['phone']);    
            if ($nPerson->save()) {
                $nTUser = new TUser;
                $nTUser->setIdPersonAttribute($nPerson->getIdAttribute());
                $nTUser->setUserNameAttribute($nPerson->getEmailAttribute());
                $password = app('hash')->make($user['password']);
                $nTUser->setPasswordAttribute($password);
                $nTUser->setTermsAttribute($user['terms']);
                $nTUser->setApiTokenAttribute(NULL);
                if ($nTUser->save()) {
                    $resultFrecuent = true;
                    foreach ($frecuentCities as $idx => $item) {
                        $nCityPerson = new CityPerson;
                        $nCityPerson->setIdCityAttribute($item);
                        $nCityPerson->setIdPersonAttribute($nPerson->getIdAttribute());
                        if (!$nCityPerson->save()) {
                            $resultFrecuent = false;
                        }
                    }
                    if ($resultFrecuent) {
                        $apikey = base64_encode(str_random(30));
                        $authTUser = TUser::find($nTUser->getIdAttribute());
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
                            if ($userAccess->save()) {
                                return ["token" => $authTUser->getApiTokenAttribute()];
                            } else {
                                return NULL;
                            }
                        } else {
                            return NULL;
                        }
                    } else {
                        return ['error' => 'La lista de ciudades frecuentes no pudo ser guardada.'];
                    }
                }
            }
        } catch (Illuminate\Database\QueryException $e) {
            return false;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }
}
