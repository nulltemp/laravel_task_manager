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

Route::group(['middleware' => 'api'], function() {
    Route::get('panels', 'PanelController@index');
    Route::post('panels', 'PanelController@store');
    Route::delete('panels/{id}', 'PanelController@destroy');

    Route::get('panels/{panelId}/tasks', 'TaskController@index');
    Route::post('tasks', 'TaskController@store');
    Route::delete('tasks/{id}', 'TaskController@destroy');
});
