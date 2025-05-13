<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;

Route::middleware('web')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        if (Auth::check()) {
            return redirect()->route(
                Auth::user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard'
            );
        }
        return redirect()->route('login');
    })->middleware('auth')->name('dashboard');

    Route::middleware('auth')->get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::middleware('auth')->get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

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
