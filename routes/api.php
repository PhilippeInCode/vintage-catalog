<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\PrivateCatalogController;

Route::middleware('auth:sanctum')->group(function () {

    Route::post('likes',               [LikeController::class, 'store']);
    Route::delete('likes/{garment}',   [LikeController::class, 'destroy']);

    Route::post('private-catalog',             [PrivateCatalogController::class, 'store']);
    Route::delete('private-catalog/{garment}', [PrivateCatalogController::class, 'destroy']);
});
