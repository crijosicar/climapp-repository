<?php

namespace App\Repositories;

use Bosnadev\Repositories\Contracts\RepositoryInterface;
use Bosnadev\Repositories\Eloquent\Repository;
use Illuminate\Support\Facades\Hash;
use App\Person;
use App\TUser;
use App\CityPerson;
use App\Http\Controllers\TUsersController;
use App\Http\Controllers\CityPersonController;

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
                    $cityPersonController = new CityPersonController();
                    $resultFrecuent = $cityPersonController->saveListFrecuentCityToUser($frecuentCities, $nPerson->getIdAttribute());
                    if ($resultFrecuent) {
                        $tUsersController = new TUsersController();
                        $athUser = $tUsersController->getUserToken($nTUser);
                        return $athUser;
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
