<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\GarmentController;

Route::apiResource('garments', GarmentController::class);
