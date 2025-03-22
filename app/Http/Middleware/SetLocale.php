<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle($request, Closure $next)
    {
        if ($request->segment(1) === 'en') {
            App::setLocale('en');
        } else {
            App::setLocale('nl');
        }

        return $next($request);
    }
}
