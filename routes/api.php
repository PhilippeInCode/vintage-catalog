<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\PrivateCatalogController;
use App\Http\Controllers\API\GarmentController;
use App\Http\Controllers\API\PendingGarmentController;

Route::middleware('auth:sanctum')->group(function () {

    Route::post('likes',               [LikeController::class, 'store']);
    Route::delete('likes/{garment}',   [LikeController::class, 'destroy']);

    Route::post('private-catalog',             [PrivateCatalogController::class, 'store']);
    Route::delete('private-catalog/{garment}', [PrivateCatalogController::class, 'destroy']);
});


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

Route::post('pending-garments', [PendingGarmentController::class, 'store']);

Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::post('pending-garments/{id}/approve', [PendingGarmentController::class, 'approve']);
    Route::post('pending-garments/{id}/reject',  [PendingGarmentController::class, 'reject']);
});
