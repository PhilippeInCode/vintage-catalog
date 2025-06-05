<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminGarmentController;
use App\Http\Controllers\GarmentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\GarmentRequestController;

Route::middleware('web')->group(function () {

    Route::get('/', fn() => view('welcome'));

    Route::get('/dashboard', function () {
        if (Auth::check()) {
            return redirect()->route(
                Auth::user()->role === 'admin' ? 'admin.dashboard' : 'user.dashboard'
            );
        }
        return redirect()->route('login');
    })->middleware('auth')->name('dashboard');

    Route::middleware(['auth'])->get('/admin/dashboard', function () {
        $requests = \App\Models\GarmentRequest::with('user', 'photos')->latest()->get();
        return view('admin.dashboard', compact('requests'));
    })->name('admin.dashboard');

    Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/garments/create', [AdminGarmentController::class, 'create'])->name('garments.create');
        Route::post('/garments', [AdminGarmentController::class, 'store'])->name('garments.store');

        Route::get('/garments/edit', [AdminGarmentController::class, 'editMode'])->name('garments.editMode');
        Route::get('/garments/{id}/edit', [AdminGarmentController::class, 'edit'])->name('garments.edit');
        Route::put('/garments/{id}', [AdminGarmentController::class, 'update'])->name('garments.update');

        Route::get('/garments/delete', [AdminGarmentController::class, 'deleteMode'])->name('garments.deleteMode');
        Route::delete('/garments', [AdminGarmentController::class, 'destroySelected'])->name('garments.destroySelected');

        Route::patch('/requests/{id}/accept', [AdminGarmentController::class, 'acceptRequest'])->name('requests.accept');
        Route::patch('/requests/{id}/reject', [AdminGarmentController::class, 'rejectRequest'])->name('requests.reject');
    });

    Route::middleware('auth')->get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/garments', [GarmentController::class, 'index'])->name('garments');
    Route::get('/values', fn() => view('values'))->name('values');
    Route::get('/about', fn() => view('about'))->name('about');
    Route::get('/contact', fn() => view('contact'))->name('contact');
    Route::get('/terms', fn() => view('terms'))->name('terms');

    Route::get('/garments/{garment}', [GarmentController::class, 'show'])->name('garments.show');

    Route::post('/garments/{id}/favorite', [FavoriteController::class, 'toggle'])
        ->middleware('auth')->name('garments.favorite');

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard/request-garment', [GarmentRequestController::class, 'create'])->name('request.garment.create');
        Route::post('/dashboard/request-garment', [GarmentRequestController::class, 'store'])->name('request.garment.store');
    });
});

Route::get('/admin-only-test', fn() => 'Acceso admin')->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

require __DIR__ . '/auth.php';
