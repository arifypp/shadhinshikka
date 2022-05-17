<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use lemonpatwari\bangladeshgeocode\Models\Division;
use App\Models\User;
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

        $chuser = User::all();
        View::share('users', $chuser);
    }
}
