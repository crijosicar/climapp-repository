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
                if(is_object($response->getData())){
                    $result = $response->getData();
                    if(isset($result->original)){
                        $responseUtil->object = $result->original;
                        $responseUtil->objectResponse = $result->original;
                    } else {
                        $responseUtil->object = $response->getData();
                        $responseUtil->objectResponse = $response->getData();
                    }
                    $responseUtil->responseList = "";
                }
                if(is_array($response->getData())){
                    $responseUtil->object = "";
                    $responseUtil->objectResponse = "";
                    $responseUtil->responseList = $response->getData();
                }
            break;
            default:
                $responseUtil->object = "";
                $responseUtil->objectResponse = "";
                $responseUtil->responseList = "";
                $responseUtil->message = "Error!";
        }

        $responseUtil->token = "";
        return $responseUtil;
    }
}