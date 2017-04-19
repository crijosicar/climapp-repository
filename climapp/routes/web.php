<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api/v1'], function($app){
	$app->group(['prefix' => 'users'], function () use ($app) {
		    $app->get('/', 'ExampleController@index');
	});
	$app->group(['prefix' => 'books'], function () use ($app) {
		    $app->get('/', 'ExampleController@index');
	});      
});


$app->group(['prefix' => 'api/v2'], function($app)
{
    $app->group(['prefix' => 'users'], function () use ($app) {
		    $app->get('/', 'ExampleController@index');
	});
	$app->group(['prefix' => 'books'], function () use ($app) {
		    $app->get('/', 'ExampleController@index');
	});
});
