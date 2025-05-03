<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PhotoController;
use App\Http\Controllers\API\PendingGarmentController;

// Photos: añadir y borrar
Route::middleware('auth:sanctum')->group(function () {
    Route::post   ('photos',           [PhotoController::class, 'store']);
    Route::delete ('photos/{photo}',   [PhotoController::class, 'destroy']);
});

// Pending garments: enviar solicitud
Route::middleware('auth:sanctum')->post(
    'pending-garments',
    [PendingGarmentController::class, 'store']
);