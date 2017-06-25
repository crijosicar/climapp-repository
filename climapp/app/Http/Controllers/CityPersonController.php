<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Repositories\CityPersonRepository;
use App\CityPerson;

class CityPersonController extends Controller {

    private $cityPersonRepository;

    public function __construct(CityPersonRepository $cityPersonRepository) {
        $this->cityPersonRepository = $cityPersonRepository;
    }

    public function getAll() {
        $MCityPerson = $this->cityPersonRepository->all();
        return response()->json($MCityPerson, Response::HTTP_OK);
    }
    
    public function saveListFrecuentCityToUser($frecuentCities, $idPerson) {
        try {
            foreach ($frecuentCities as $idx => $item) {
                $nCityPerson = new CityPerson;
                $nCityPerson->setIdCityAttribute($item);
                $nCityPerson->setIdPersonAttribute($idPerson);
                if(!$nCityPerson->save()){
                    return false;
                }
            }
            return true;
        } catch (Illuminate\Database\QueryException $e) {
            return false;
        } catch (PDOException $e) {
            return false;
        } catch (Exception $e) {
            return false;
        }
    }

}
