<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use lemonpatwari\bangladeshgeocode\Models\Division;
use View;

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
        //
        $divisions = Division::all();
        View::share('divisions', $divisions);
    }
}
