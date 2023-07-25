<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Services\TranslationService;
use Illuminate\Contracts\Translation\Loader;

class SetLocal
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Get the user's preferred language from the session or the request headers
        $locale = Session::get('locale') ?? $request->getPreferredLanguage();

        // Set the application's locale
        App::setLocale($locale);

        // Set the translations loader for the application
        App::singleton('translation.loader', function ($app) use ($locale) {
            return new DatabaseLoader($locale);
        });


        return $next($request);
    }
};


class DatabaseLoader implements Loader
{
    protected $locale;

    public function __construct($locale)
    {
        $this->locale = $locale;
    }

    public function load($locale, $group, $namespace = null)
    {
        $translations = Translation::where('locale', $locale)->get();

        $result = [];

        foreach ($translations as $translation) {
            $result[$translation->key] = $translation->value;
        }

        return $result;
    }

    public function addNamespace($namespace, $hint)
    {
        //
    }

    public function namespaces()
    {
        return [];
    }

    public function hint($group)
    {
        //
    }
}
