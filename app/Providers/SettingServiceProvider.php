<?php

namespace App\Providers;

use App\Models\Backend\Admin\Settings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class SettingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('settings', function(){
            return new Settings();
        });
        $loader = AliasLoader::getInstance();
        $loader->alias('Setting',Settings::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(!App::runningInConsole() && count(Schema::getColumnListing('settings'))){
            $settings = Settings::all();
            foreach ($settings as $setting) {
                Config::set('settings.'.$setting->name,$setting->value);
            }
        }
    }
}
