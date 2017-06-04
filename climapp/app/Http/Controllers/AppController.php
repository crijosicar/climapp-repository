<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AppController extends Controller {
    
    public function getAppVersion() {
        return response()->json(['app' => 'Api Rest Clima App'], Response::HTTP_OK);
    }
}
