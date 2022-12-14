<?php

use Illuminate\Support\Facades\Route;
//Controllers
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Signin\SigninController;
use App\Http\Controllers\Login\LoginController;
// use App\Http\Controllers\Devinfo\DevinfoController;
use App\Http\Controllers\Upload\UploadController;
use App\Http\Controllers\Gallery\GalleryController;
use App\Http\Controllers\UserConfig\UserConfigController;
use App\Http\Controllers\Search\SearchController;
use App\Http\Controllers\ImageStorage\ImageStorageController;
use App\Http\Controllers\Image\ImageController;
use App\Http\Controllers\Comment\CommentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\PasswordReset\PasswordResetController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Login / Sign in

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate'); 
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/create-account', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'createUser'])->name('createUser');

// User configuration

Route::get('/user-config', [UserConfigController::class, 'index'])->name('user-config'); //TODO -> parámetros
Route::post('/user-config', [UserConfigController::class, 'updateUser'])->middleware('auth')->name('updateUser');
Route::post('/delete-account', [UserController::class, 'deleteUser'])->name('delete-account');

// Comments, uploads and search

Route::get('/post', [UploadController::class, 'index'])->middleware('auth')->name('upload-form');
Route::post('/upload', [UploadController::class, 'uploadImage'])->middleware('auth')->name('upload');
Route::get('/search', [SearchController::class, 'index'])->name('search');

// Gallery, Images

Route::get('/gallery/{user}', [GalleryController::class, 'userGalleryIndex'])->middleware('auth')->name('gallery');
Route::get('/gallery/{username}/{image_title}', [ImageController::class, 'viewImage'])->name('image-details');
Route::post('/gallery/{username}/{image_title}/post', [CommentController::class, 'create'])->middleware('auth')->name('create-comment');
Route::post('/delete-image', [ImageController::class, 'delete'])->middleware('auth')->name('delete-image');

// Reset password

Route::post('/reset-password', [PasswordResetController::class, 'passwordReset'])->name('password-reset');