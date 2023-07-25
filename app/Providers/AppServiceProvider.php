<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Support\Facades\View;
use App\Models\ContactDetails;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $user=Auth::user();
            if ($user) {
                $hasShop = Shop::where('user_id', $user->id)->first();
                $view->with('hasShop', $hasShop);
            }
            
        });
        
        $details = ContactDetails::get()->first();
        view()->share('details', $details);
    }
}
