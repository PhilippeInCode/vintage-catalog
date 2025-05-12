<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
/*
Test routes for the application (for testing purposes only, may be removed in the future)
*/ 
Route::view('/test-header', 'test-header-full');

Route::view('/test-footer', 'test-footer-full');

Route::view('/test-hero', 'test-hero-full');

Route::view('/test-vintage', 'test-vintage-full');

Route::view('/test-values', 'test-values-full');

Route::view('/test-catalog', 'test-catalog-full');

Route::view('/test-cta', 'test-cta-full');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/garments', function () {
    return view('garments');
})->name('garments');

/* Route::get('/garment/{id}', function ($id) {
    return view('garment', ['id' => $id]);
})->name('garment');
 */

 Route::get('/values', function () {
    return view('values');
})->name('values');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

require __DIR__.'/auth.php';
