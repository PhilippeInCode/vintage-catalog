<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;  
class Kernel extends HttpKernel
{
    protected $middleware = [
    ];

    protected $middlewareGroups = [
        'web' => [
          \Illuminate\Cookie\Middleware\EncryptCookies::class,
           \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
             \Illuminate\View\Middleware\ShareErrorsFromSession::class,
              \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
               \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    protected $routeMiddleware = [
        'auth'     => \Illuminate\Auth\Middleware\Authenticate::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'admin'    => \App\Http\Middleware\IsAdmin::class,
        'redirect.role' => \App\Http\Middleware\RedirectIfAuthenticatedWithRole::class,
    ];
}
