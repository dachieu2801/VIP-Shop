<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocaleShopApi
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $locale = $request->header('locale');
        if (empty($locale)) {
            $locale = $request->get('locale');
        }
        $locale = $locale ?? 'zh_cn';

        $languages = languages()->toArray();
        register('locale', $locale);
        if (in_array($locale, $languages)) {
            App::setLocale($locale);
        } else {
            App::setLocale('en');
        }

        return $next($request);
    }
}
