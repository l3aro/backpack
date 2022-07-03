<?php

namespace Modules\Core\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SetupRouteLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);
        app()->setLocale($locale);
        if (array_key_exists($locale, config('app.locales'))) {
            return $next($request);
        }
        $segments = $request->segments();
        Arr::pull($segments, 0);
        $segments = Arr::prepend($segments, config('app.fallback_locale'));
        return redirect()->to(implode('/', $segments));
    }
}
