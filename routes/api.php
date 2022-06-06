<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Controllers;
use App\Http\Controllers\PostController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/post', 'App\Http\Controllers\PostController@store')->name('upload_post');
Route::get('/post', function () { return redirect('/test'); })->name('post');
Route::get('/post/{id?}', 'App\Http\Controllers\PostController@index')->name('get_post');
Route::get('/user/{name}', 'App\Http\Controllers\UserController@getUser')->middleware('auth')->name('get_user');
## Redireccionado de rutas ==> controladores
