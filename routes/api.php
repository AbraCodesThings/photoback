<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Controllers;
use App\Http\Controllers\Api\ApiController;

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
Route::get('/testeo/{username}/{title}', [ApiController::class, 'getImageURL']);
Route::get('/testeo/{username}', [ApiController::class, 'getUserImages']);
// Route::middleware('auth')->group(function () {
//
// });
// Route::post('/post', 'App\Http\Controllers\PostController@store')->name('upload_post');
// Route::get('/post', function () { return redirect('/test'); })->name('post');
// Route::get('/post/{id?}', 'App\Http\Controllers\PostController@index')->name('get_post');
// ## Route::get('/user/{name}', 'App\Http\Controllers\UserController@getUser')->middleware('auth')->name('get_user');
// ## Redireccionado de rutas ==> controladores

// Route::get('/user-gallery/{username}/{filename}', 'App\Http\Controllers\ImageStorage\ImageStorageController@get')->name('get-image');
// Route::get('/user-gallery/{username}/all', 'App\Http\Controllers\ImageStorage\ImageStorageController@getAll')->name('get-all');
// Route::post('/user-gallery/post', 'App\Http\Controllers\ImageStorage\ImageStorageController@upload')->name('upload');
// Route::post('/user-gallery/{username}/update', 'App\Http\Controllers\ImageStorage\ImageStorageController@update')->middleware('auth')->name('update');
// Route::post('/user-gallery/{username}/{filename}/delete', 'App\Http\Controllers\ImageStorage\ImageStorageController@delete')->middleware('auth')->name('delete');
