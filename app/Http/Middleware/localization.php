<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Redirect;
use Closure;
use Illuminate\Support\Facades\App;
class localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('locale')){
            App::setlocale(session()->get('locale'));
        }
        return $next($request);
    }
}
