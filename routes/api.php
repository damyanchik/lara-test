<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\MovieController;
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
Route::middleware('api')->group(function () {
    Route::get('titles', [MovieController::class, 'getTitles']);
    Route::post('login', [AuthController::class, 'login']);
});
