<?php

use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/provinces')->group(function () {
    Route::get('', [ProvinceController::class, 'index']);
    Route::get('/{id}', [ProvinceController::class, 'show']);
    Route::post('/store', [ProvinceController::class, 'store']);
    Route::post('{province}', [ProvinceController::class, 'update']);
    Route::delete('{province}', [ProvinceController::class, 'destroy']);
});


Route::prefix('/districts')->group(function () {
    Route::get('', [DistrictController::class, 'index']);
    Route::get('/{id}', [DistrictController::class, 'show']);
    Route::post('/store', [DistrictController::class, 'store']);
    Route::post('{district}', [DistrictController::class, 'update']);
    Route::delete('{district}', [DistrictController::class, 'destroy']);
});
