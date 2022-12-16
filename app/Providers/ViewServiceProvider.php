<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.sidebar.admin', function ($view) {
            $view->with('sidebar', Menu::with('pages')->orderBy('ordering')->get());
        });
        
        view()->composer(['partials.footer.admin','partials.head.meta','partials.head.title','partials.head.icon'], function ($view) {
            $view->with('meta', cache()->get('application.1'));
        });
    }
}