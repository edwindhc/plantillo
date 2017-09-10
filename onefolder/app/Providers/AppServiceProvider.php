<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        if(Cache::has('setting_cache')) {
            $settings = Cache::get('setting_cache');
        } else {
            $settings = \App\Setting::find(1);
            Cache::put('setting_cache', $settings, 60);
        }
        if(Cache::has('category_cache')) {
            $categories = Cache::get('category_cache');
        } else {
            $categories = \App\Category::all();
            Cache::put('category_cache', $categories, 60);
        }
        view()->share('settings', $settings);
        view()->share('categories', $categories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
