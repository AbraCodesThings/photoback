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

//Get images

Route::get('/{username}/{title}', [ApiController::class, 'getImage']);
Route::get('/{username}', [ApiController::class, 'getUserImages']);

//Login / Logout

Route::post('/login', [ApiController::class, 'loginAPI']);
Route::middleware('auth:sanctum')->post('/logout', [ApiController::class, 'logoutAPI']);

//Upload and delete

Route::middleware('auth:sanctum')->post('/upload', [ApiController::class, 'uploadImage']);
Route::middleware('auth:sanctum')->post('/delete', [ApiController::class, 'deleteImage']);