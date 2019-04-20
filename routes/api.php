<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/**
 * Rotas vindas a API autenticada
 */
Route::group(['namespace' => 'Api', 'middleware' => [
//    'auth',
//    'cors'
], 'as' => 'api.'], function () {

    //Rotas para visitas
    Route::prefix('/visitas')->group(function () {
        Route::get('/obtem/{id}', 'VisitasController@obtemPorId')->name('visitas.obtemPorId');
        Route::get('/obtem-todos', 'VisitasController@obtemTodos')->name('visitas.obtemTodos');
    });
});

/**
 * Rotas vindas de api liberadas por CORS [default => '*']
 */
Route::group(['middleware' => [
    'cors'
], 'as' => 'api.'], function () {

});