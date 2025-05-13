<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::middleware('web')->group(function () {

    Route::view('/test-header', 'test-header-full');
    Route::view('/test-footer', 'test-footer-full');
    Route::view('/test-hero', 'test-hero-full');
    Route::view('/test-vintage', 'test-vintage-full');
    Route::view('/test-values', 'test-values-full');
    Route::view('/test-catalog', 'test-catalog-full');
    Route::view('/test-cta', 'test-cta-full');

    Route::get('/', fn () => view('welcome'));

    Route::get('/dashboard', fn () => 'Autenticado correctamente')->middleware('auth')->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/garments', fn () => view('garments'))->name('garments');
    Route::get('/values', fn () => view('values'))->name('values');
    Route::get('/about', fn () => view('about'))->name('about');
    Route::get('/contact', fn () => view('contact'))->name('contact');
    Route::get('/terms', fn () => view('terms'))->name('terms');

});

require __DIR__.'/auth.php';
