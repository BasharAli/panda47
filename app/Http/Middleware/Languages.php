<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Services\TranslationService;


class Languages
{
    protected $translationService;

    public function __construct(TranslationService $translationService)
    {
        $this->translationService = $translationService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session()->has('applocale') and array_key_exists(Session()->get('applocale'), config('lang'))) {
            App::setlocale(Session()->get('applocale'));
        } else {
            App::setlocale(config('app.fallback_locale'));
        }


        $locale = App::getLocale();
        $translations = $this->translationService->getTranslations($locale);
        $jsonPath = resource_path("lang/$locale.json");
        $jsonContent = json_encode($translations, JSON_PRETTY_PRINT);

        file_put_contents($jsonPath, $jsonContent);
        
        return $next($request);
    }
}
