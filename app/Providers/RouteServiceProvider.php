<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Carga tus rutas API bajo /api
            Route::prefix('api')
                 ->middleware('api')
                 ->group(base_path('routes/api.php'));

            // Carga las rutas web bajo /
            Route::middleware('web')
                 ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Define rate limiters (opcional).
     */
    protected function configureRateLimiting(): void
    {
        //
    }
}
