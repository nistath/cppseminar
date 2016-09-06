<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {
	$api->post('/authenticate', 'App\Modules\Cerberus\Http\Controllers\AuthenticateController@authenticate');

	$api->get('/hubs', 'App\Modules\Cerberus\Http\Controllers\HubController@index');
	$api->post('/hubs', 'App\Modules\Cerberus\Http\Controllers\HubController@store');
	$api->get('/hubs/{id}', 'App\Modules\Cerberus\Http\Controllers\HubController@show');
	$api->post('/hubs/deploy', 'App\Modules\Cerberus\Http\Controllers\HubController@deploy');
	//$api->post('/hubs/sitrep', 'App\Modules\Cerberus\Http\Controllers\HubController@sitrep');

	$api->get('/refugees/{id}', 'App\Modules\Cerberus\Http\Controllers\RefugeeController@index');

	$api->post('/actions', 'App\Modules\Cerberus\Http\Controllers\ActionsController@store');
});