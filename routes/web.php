<?php

use Illuminate\Support\Facades\Route;

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

## Ruta de pruebas ##

## Por ahora tiene un placeholder,
## en el futuro será un easter egg :)

Route::get('/test', function () {
    return view('placeholder');
});
