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

use App\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
  return redirect('/tasks');
});
Route::get('/tasks', 'TaskController@index');
Route::post('/tasks', 'TaskController@store');
Route::delete('/tasks/{id}', 'TaskController@destroy');
