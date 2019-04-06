<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v0')->group(function() {

    Route::post('auth/login', 'AuthController@login');

    Route::group(['middleware' => ['jwt.auth', 'cors']], function() {
        Route::get('auth/refresh', 'AuthController@refresh');
        Route::get('auth/current', 'AuthController@getCurrentUser');

        // Routes for wrestler
        Route::get('wrestler', 'WrestlersController@getPaged');
        Route::get('wrestler/{id}', 'WrestlersController@getById');
        Route::get('wrestler/{id}/rivalries', 'WrestlersController@getRivalries');
        Route::get('wrestler/{id}/reigns', 'WrestlersController@getReigns');
        Route::post('wrestler', 'WrestlersController@create');
        Route::put('wrestler/{id}', 'WrestlersController@update');
        Route::delete('wrestler/{id}', 'WrestlersController@delete');

        // Routes for championship
        Route::get('championship', 'ChampionshipsController@getPaged');
        Route::get('championship/{id}', 'ChampionshipsController@getById');
        Route::get('championship/{id}/champion', 'ChampionshipsController@getChampion');
        Route::post('championship', 'ChampionshipsController@create');
        Route::put('championship/{id}', 'ChampionshipsController@update');
        Route::delete('championship/{id}', 'ChampionshipsController@delete');

        // Routes for championship reign
        Route::get('championship-reign', 'ChampionshipReignsController@getAll');
        Route::get('championship-reign/{id}', 'ChampionshipReignsController@getById');
        Route::post('championship-reign', 'ChampionshipReignsController@create');
        Route::put('championship-reign/{id}', 'ChampionshipReignsController@update');

        // Routes for show
        Route::get('show/all', 'ShowsController@getAll');
        Route::get('show', 'ShowsController@getPaged');
        Route::get('show/{id}', 'ShowsController@getById');
        Route::get('show/{id}/championships', 'ShowsController@getChampionships');
        Route::get('show/{id}/roster', 'ShowsController@getRoster');
        Route::post('show', 'ShowsController@create');
        Route::put('show/{id}', 'ShowsController@update');
        Route::delete('show/{id}', 'ShowsController@delete');

        // Routes for rivalry
        Route::get('rivalry', 'RivalriesController@getAll');
        Route::get('rivalry/{id}', 'RivalriesController@getById');
        Route::post('rivalry', 'RivalriesController@create');
        Route::put('rivalry/{id}', 'RivalriesController@update');
        Route::delete('rivalry/{id}', 'RivalriesController@delete');
        // TODO: Add route for renewing a rivalry.
    });


});
