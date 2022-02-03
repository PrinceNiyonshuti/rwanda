<?php

use App\Http\Controllers\CellController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SectorController;
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


Route::prefix('/sectors')->group(function () {
    Route::get('', [SectorController::class, 'index']);
    Route::get('/{id}', [SectorController::class, 'show']);
    Route::post('/store', [SectorController::class, 'store']);
    Route::post('{sector}', [SectorController::class, 'update']);
    Route::delete('{sector}', [SectorController::class, 'destroy']);
});


Route::prefix('/cells')->group(function () {
    Route::get('', [CellController::class, 'index']);
    Route::get('/{id}', [CellController::class, 'show']);
    Route::post('/store', [CellController::class, 'store']);
    Route::post('{cell}', [CellController::class, 'update']);
    Route::delete('{cell}', [CellController::class, 'destroy']);
});
