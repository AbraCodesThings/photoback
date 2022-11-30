<?php

use Illuminate\Support\Facades\Route;
//Controllers
use App\Http\Controllers\Home\HomeController;

use App\Http\Controllers\Signin\SigninController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Devinfo\DevinfoController;
use App\Http\Controllers\Upload\UploadController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserConfig\UserConfigController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');
//Route::get('/about', 'App\Http\Controllers\About\AboutController@index')->name('about');
Route::get('/create-account', [SigninController::class, 'index'])->name('signin');
//Route::get('/login', 'App\Http\Controllers\Login\LoginController@index')->name('login');
Route::get('/login', [LoginController::class, 'index'])->name('login');
//Route::get('/devinfo', 'App\Http\Controllers\Devinfo\DevinfoController@index')->name('devinfo');
Route::get('/devinfo', [DevinfoController::class, 'index'])->name('devinfo');
//Route::get('/user-config', 'App\Http\Controllers\UserConfig\UserConfigController@index')->name('user-config');
Route::get('/user-config', [UserConfigController::class, 'index'])->name('user-config');
//Route::get('/logout', 'App\Http\Controllers\Login\LoginController@logout')->name('logout');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/user-gallery/post', 'App\Http\Controllers\Upload\UploadController@index')->middleware('auth')->name('upload-form');
Route::get('/user-gallery/post', [UploadController::class, 'index'])->middleware('auth')->name('upload-form');
//Route::get('/my-gallery', 'App\Http\Controllers\GalleryController@userGalleryIndex')->middleware('auth')->name('my-gallery');
Route::get('/my-gallery', [GalleryController::class, 'userGalleryIndex'])->middleware('auth')->name('my-gallery'); //TODO: se puede hacer una sola función que devuelva la galería del user que se le pase por parámetro

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate'); // <- should use the Auth middleware, TODO
Route::post('/signin', [SigninController::class, 'createUser'])->name('createUser'); // <- should use the Auth middleware, TODO
//Route::post('/user-config', 'App\Http\Controllers\UserConfig\UserConfigController@updateUser')->name('updateUser');
Route::post('/user-config', [UserConfigController::class, 'updateUser'])->name('updateUser');
//Route::post('/upload', 'App\Http\Controllers\Upload\UploadController@uploadImage')->middleware('auth')->name('upload');
Route::post('/upload', [UploadController::class, 'uploadImage'])->middleware('auth')->name('upload');

/* TODO
    Limpiar rutas y controladores tal que así -> Route::get('/home', [HomeCoApp\Http\Controllers\UserConfig\UserConfigControllerntroller::class, 'index'])->name('home');
    Acuérdate de importar TODOS los controladores que vayas a usar.

    Rutas parametrizadas (lo cual incluye arreglar un poco los controladores)

    Cambiar nombres de las rutas para que coincidan. Acuérdate de cambiarlo en los controladores y vistas que las usen.
*/