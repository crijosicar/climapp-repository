<?php

namespace App\Http\Middleware;

use App\ResponseUtil;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResponseMiddleware {

    public function handle(Request $request, Closure $next) {

        $response = $next($request);
            
        $responseUtil = new ResponseUtil;
        $responseUtil->tipo = $response->getStatusCode();
        switch ($response->getStatusCode()) {
            case 200:
                $responseUtil->message = "OK";
                if (is_object($response->getData())) {
                    $getToken = $response->getData();
                    if (isset($getToken->token)) {
                        $responseUtil->token = $getToken->token;
                    }
                    $responseUtil->object = "";
                    $responseUtil->objectResponse = $response->getData();
                    $responseUtil->responseList = "";
                }
                if (is_array($response->getData())) {
                    $getToken = $response->getData();
                    if (isset($getToken->token)) {
                        $responseUtil->token = $getToken->token;
                    }
                    $responseUtil->object = "";
                    $responseUtil->objectResponse = "";
                    $responseUtil->responseList = $response->getData();
                }
                break;
            case 404:
                $responseUtil->message = "Error!, no encontrado.";
                $responseUtil->object = "";
                $responseUtil->objectResponse = "";
                $responseUtil->responseList = "";
                break;
            case 406:
                $responseUtil->message = "Error!, revisar los datos ingresados.";
                $responseUtil->object = "";
                $responseUtil->objectResponse = "";
                $responseUtil->responseList = "";
                break;
            case 417:
                $responseUtil->message = "Error!, favor revisar los campos.";
                if (is_object($response->getData())) {
                    $getToken = $response->getData();
                    if (isset($getToken->token)) {
                        $responseUtil->token = $getToken->token;
                    }
                    $responseUtil->object = $response->getData();
                    $responseUtil->objectResponse = $response->getData();
                    $responseUtil->responseList = "";
                }
                if (is_array($response->getData())) {
                    $getToken = $response->getData();
                    if (isset($getToken->token)) {
                        $responseUtil->token = $getToken->token;
                    }
                    $responseUtil->object = "";
                    $responseUtil->objectResponse = "";
                    $responseUtil->responseList = $response->getData();
                }
                break;
            case 511:
                $responseUtil->message = "Error!, no autorizado.";
                $responseUtil->object = "";
                $responseUtil->objectResponse = "";
                $responseUtil->responseList = "";
                break;
            default:
                    $responseUtil->message = $response->getData();
                    $responseUtil->object = "";
                    $responseUtil->objectResponse = "";
                    $responseUtil->responseList = "";
                }

        return response($responseUtil)
                ->withHeaders([
                    'Access-Control-Allow-Methods' => 'GET, POST',
                    'Access-Control-Allow-Headers' => $request->header('Access-Control-Request-Headers'),
                    'Access-Control-Allow-Origin' => '*'
                ]);
    }

}
