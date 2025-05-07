<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GarmentController;

Route::get('ping', fn() => response('pong'));

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('garments', GarmentController::class);
});

Route::get('garments',            [GarmentController::class, 'index']);
Route::get('garments/{garment}',  [GarmentController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('garments',           [GarmentController::class, 'store']);
    Route::put('garments/{garment}',  [GarmentController::class, 'update']);
    Route::delete('garments/{garment}', [GarmentController::class, 'destroy']);
});
