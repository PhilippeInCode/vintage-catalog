<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if(!$user || $user->role !== 'admin'){
            abort(Response::HTTP_FORBIDDEN, 'Forbidden');
        }
        return $next($request);
    }
}
