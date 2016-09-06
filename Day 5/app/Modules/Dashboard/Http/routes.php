<?php
Route::group(['middleware' => ['web']], function () {
	Route::get('login', 'Auth\AuthController@showLoginForm')->name('auth.login');;
	Route::post('login', 'Auth\AuthController@login');
	Route::get('logout', 'Auth\AuthController@logout')->name('auth.logout');

	Route::group(['middleware' => 'auth'], function() {
		Route::get('/', 'DashboardController@index')->name('dashboard');

		Route::resource('/hubs', 'HubController');

		Route::resource('/refugees', 'RefugeeController');
	});
});