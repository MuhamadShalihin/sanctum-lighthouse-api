<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\UserApiController;

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

// public routes
// Route::resource('users', UserApiController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/users', [UserApiController::class, 'index']);
Route::get('/users/{id}', [UserApiController::class, 'show']);
Route::get('/users/search/{name}', [UserApiController::class, 'search']);


// Route::get('/users', [UserApiController::class, 'index']);

// Route::post('/users', [UserApiController::class, 'store']);

// protected routes
Route::group(['middleware' => 'auth:sanctum'], function () {
    // Route::get('/users/search/{name}', [UserApiController::class, 'search']);
    Route::post('/users', [UserApiController::class, 'store']);
    Route::put('/users/{id}', [UserApiController::class, 'update']);
    Route::delete('/users/{id}', [UserApiController::class, 'destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
