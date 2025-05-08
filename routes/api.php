<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PendingGarmentController;

Route::post('pending-garments', [PendingGarmentController::class, 'store']);

Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::post('pending-garments/{id}/approve', [PendingGarmentController::class, 'approve']);
    Route::post('pending-garments/{id}/reject',  [PendingGarmentController::class, 'reject']);
});
