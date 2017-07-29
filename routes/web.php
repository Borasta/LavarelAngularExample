<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/api')->group(function () {

	Route::get('/alerts/list/{each?}/search/{q?}', 'AlertsController@search');
	Route::resource('/alerts', 'AlertsController', [
		'only' => [
			'show', 'store', 'update', 'destroy'
		]
    ]);

		Route::get('/rounds/list/{each?}/search/{q?}', 'RoundsController@search');
    Route::resource('/rounds', 'RoundsController', [
		'only' => [
			'show', 'store', 'update', 'destroy'
		]
    ]);

	Route::get('/status-alerts', function() {
		return App\StatusAlert::all();
	});

	Route::get('/status-rounds', function() {
		return App\StatusRound::all();
	});

	Route::get('/employees', function() {
		return App\Employee::all();
	});
	Route::get('/offices', function() {
		return App\Office::all();
	});

});