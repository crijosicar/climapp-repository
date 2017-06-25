<?php

namespace App\Http\Controllers;

use App\PersonFrecuentCity;


class PersonFrecuentCitiesController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }
    
}
