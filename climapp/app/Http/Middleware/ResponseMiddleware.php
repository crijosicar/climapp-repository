<?php namespace App\Http\Middleware;

use App\ResponseUtil;
use Closure;

class ResponseMiddleware {
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        // Perform action
        $responseUtil = new ResponseUtil;
        $responseUtil->tipo = $response->getStatusCode();
        switch($response->getStatusCode()){
            case 200:
                $responseUtil->message = "OK";
            break;
            default:
                $responseUtil->message = "Error!";
        }
        if(is_object($response->getData())){
             $responseUtil->object = $response->getData();
             $responseUtil->objectResponse = $response->getData();
             $responseUtil->responseList = null;
        }
        if(is_array($response->getData())){
            $responseUtil->object = null;
            $responseUtil->objectResponse = null;
            $responseUtil->responseList = $response->getData();
        }
        $responseUtil->token = null;
        return $responseUtil;
    }
}