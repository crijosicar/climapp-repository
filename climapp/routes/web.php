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

$app->group(['prefix' => 'api/v1' , 'middleware' => 'after'], function($app){
	$app->get('/', function () use ($app) {
	    return $app->version();
	});

	
	/**
	 * Routes for resource city
	 */
	$app->group(['prefix' => 'city'], function () use ($app) {
		$app->get('/','CityController@all');
		$app->get('{id}', 'CityController@get');
	    $app->get('custom/{id}', 'CityController@customQuery');
		$app->get('eloquent/{id}', 'CityController@eloquentQuery');
		$app->post('/', 'CityController@add');
		$app->put('{id}', 'CityController@put');
		$app->delete('{id}', 'CityController@remove');
	});


	/**
	 * Routes for resource city-person
	 */
	$app->group(['prefix' => 'city-person'], function () use ($app) {
		$app->get('/', 'CityPersonController@all');
		$app->get('{id}', 'CityPersonController@get');
		$app->post('/', 'CityPersonController@add');
		$app->put('{id}', 'CityPersonController@put');
		$app->delete('{id}', 'CityPersonController@remove');
	});
	
	/**
	 * Routes for resource person
	 */
	$app->group(['prefix' => 'person'], function () use ($app) {
		$app->get('/', 'PeopleController@all');
		$app->get('{id}', 'PeopleController@get');
		$app->post('/', 'PeopleController@add');
		$app->put('{id}', 'PeopleController@put');
		$app->delete('{id}', 'PeopleController@remove');
	});

	/**
	 * Routes for resource t-user
	 */
	$app->group(['prefix' => 't-user'], function () use ($app) {
		$app->get('/', 'TUsersController@all');
		$app->get('{id}', 'TUsersController@get');
		$app->post('/', 'TUsersController@add');
		$app->put('{id}', 'TUsersController@put');
		$app->delete('{id}', 'TUsersController@remove');
	});

	/**
	 * Routes for resource user-access
	 */
	$app->group(['prefix' => 'user-access'], function () use ($app) {
		$app->get('/', 'UserAccessesController@all');
		$app->get('{id}', 'UserAccessesController@get');
		$app->post('/', 'UserAccessesController@add');
		$app->put('{id}', 'UserAccessesController@put');
		$app->delete('{id}', 'UserAccessesController@remove');
	});

	/**
	 * Routes for resource value-list
	 */
	$app->group(['prefix' => 'value-list'], function () use ($app) {
		$app->get('/', 'ValueListsController@all');
		$app->get('{id}', 'ValueListsController@get');
		$app->post('/', 'ValueListsController@add');
		$app->put('{id}', 'ValueListsController@put');
		$app->delete('{id}', 'ValueListsController@remove');
	});
});
