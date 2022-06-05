<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;
use Illuminate\Http\Request;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $language = Session::get('language', config('app.locale'));
        switch ($language) {
            case 'en':
                $language = 'en';
                break;
            case 'ja':
                $language = 'ja';
                break;
            default:
                $language = 'vi';
                break;
        }
        App::setLocale($language);

        return $next($request);
    }
}
