<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;

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
    return redirect(route('home'));
});

## Ruta de pruebas ##

## Por ahora tiene un placeholder,
## en el futuro será un easter egg :)

Route::get('/test', function () {
    return view('testing.test_panel');
})->name('test');

Route::get('/home', 'App\Http\Controllers\Home\HomeController@index')->name('home');
Route::get('/about', 'App\Http\Controllers\About\AboutController@index')->name('about');
Route::get('/signin', 'App\Http\Controllers\Signin\SigninController@index')->name('signin');
Route::get('/login', 'App\Http\Controllers\Login\LoginController@index')->name('login');
Route::get('/devinfo', 'App\Http\Controllers\Devinfo\DevinfoController@index')->name('devinfo');
Route::get('/user-config', 'App\Http\Controllers\UserConfig\UserConfigController@index')->name('user-config');
Route::get('/logout', 'App\Http\Controllers\Login\LoginController@logout')->name('logout');
Route::get('/user-gallery/post', 'App\Http\Controllers\Upload\UploadController@index')->middleware('auth')->name('upload-form');
Route::get('/my-gallery', 'App\Http\Controllers\GalleryController@userGalleryIndex')->middleware('auth')->name('my-gallery');

Route::post('/login', 'App\Http\Controllers\Login\LoginController@authenticate')->name('authenticate'); // <- should use the Auth middleware, TODO
Route::post('/signin', 'App\Http\Controllers\Signin\SigninController@createUser')->name('createUser'); // <- should use the Auth middleware, TODO
Route::post('/user-config', 'App\Http\Controllers\UserConfig\UserConfigController@updateUser')->name('updateUser');
Route::post('/upload', 'App\Http\Controllers\Upload\UploadController@uploadImage')->middleware('auth')->name('upload');

/* TODO
    Limpiar rutas y controladores
*/