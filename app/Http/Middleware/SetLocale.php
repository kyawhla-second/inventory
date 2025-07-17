<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Retrieve locale from session or fallback to app locale
        $locale = session('locale', config('app.locale'));
        // Apply locale to the application instance
        app()->setLocale($locale);

        return $next($request);
    }
}
