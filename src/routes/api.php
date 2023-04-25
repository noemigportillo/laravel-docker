<?php

use App\Infrastructure\Controllers\GetStatusController;
use App\Infrastructure\Controllers\GetUserController;
use App\Infrastructure\Controllers\GetUserEarlyAdopterController;
use App\Infrastructure\Controllers\GetUsers\GetUsersController;
use App\Infrastructure\Controllers\IsEarlyAdopterUserController;
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


Route::get('/status', GetStatusController::class);
Route::get('/user/{userEmail}', GetUserController::class);
Route::get('/users', GetUsersController::class);
Route::get('/user/early-adopter/{userEmail}', GetUserEarlyAdopterController::class);
