<?php

/*
--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/
$app->get('/', 'AppController@getAppVersion');

$app->group(['prefix' => 'api/v1'], function($app){
	
	$app->get('/', 'AppController@getAppVersion');
                
        /**
	* Routes for public routes
	*/
	$app->group(['prefix' => 'p'], function () use ($app) {
            $app->get('/city', 'CityController@getAll');
            $app->get('/city/getAllCities', 'CityController@getAllCitiesList');
            $app->get('/value-list/getAllValuesByCategory/{category}', 'ValueListsController@getAllValuesByCategoryList');
            $app->post('/person/addNewUser', 'PeopleController@postRegisterNewUser');
            $app->post('/user/auth', 'TUsersController@userAuth');
	});
	
	/**
	* Routes for resource city
	*/
	$app->group(['prefix' => 'city', 'middleware' => 'auth'], function () use ($app) {
            $app->get('/', 'CityController@getAll');
            $app->get('getAllCities', 'CityController@getAllCitiesList');
            $app->post('getCityByCityName', 'CityController@getCityByCityName');
            $app->post('getCityById/{id}', 'CityController@getCityById');
            $app->post('addNewCity', 'CityController@addNewCity');
            $app->post('updateCityById/{id}', 'CityController@updateCityById');
	});
	

	/**
	* Routes for resource city-person
	*/
	$app->group(['prefix' => 'city-person', 'middleware' => 'auth'], function () use ($app) {
            $app->get('/','CityPersonController@getAll');
	});
	
	
	/**
	* Routes for resource person
	*/
	$app->group(['prefix' => 'person', 'middleware' => 'auth'], function () use ($app) {
            $app->get('/', 'PeopleController@getAll');		
            $app->post('/addNewUser', 'PeopleController@postRegisterNewUser');		
	});
	
	
	/**
	* Routes for resource t-user
	*/
	$app->group(['prefix' => 'user', 'middleware' => 'auth'], function () use ($app) {
            $app->get('/', 'TUsersController@getAll');
            $app->post('auth', 'TUsersController@userAuth');
	});
	
	
	/**
	* Routes for resource user-access
	*/
	$app->group(['prefix' => 'user-access', 'middleware' => 'auth'], function () use ($app) {
            $app->get('/', 'UserAccessesController@getAll');
	});
	
	
	/**
	* Routes for resource value-list
        */
	$app->group(['prefix' => 'value-list', 'middleware' => 'auth'], function () use ($app) {
            $app->get('/', 'ValueListsController@getAll');
            $app->get('/getAllValuesByCategory/{category}', 'ValueListsController@getAllValuesByCategoryList');
            $app->get('/findByCategory/{category}', 'ValueListsController@findByCategory');
            $app->post('/addNewValueList', 'ValueListsController@addNewValueList');
	});
});
