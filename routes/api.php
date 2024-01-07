<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\PropertiesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Public routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::get('/brokers', [BrokerController::class, 'index']);
Route::get('/brokers/{broker}', [BrokerController::class, 'show']);
Route::get('/properties', [PropertiesController::class, 'index']);
Route::get('/properties/{property}', [PropertiesController::class, 'show']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::apiResource('/brokers', BrokerController::class)->only([
        'store', 'update', 'destroy'
    ]);
    Route::apiResource('/properties', PropertiesController::class)->only([
        'store', 'update', 'destroy'
    ]);
    Route::post('/logout', [AuthController::class, 'logout']);
});