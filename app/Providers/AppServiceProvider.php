<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Genre;
use App\Entry;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        view()->composer('partials.header', function($view){
                $view->with(['genres' => Genre::all(),'entry' => Entry::all()]);
            }
        );
    }
}
