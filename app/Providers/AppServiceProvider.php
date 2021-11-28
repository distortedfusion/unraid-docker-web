<?php

namespace App\Providers;

use App\Docker;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('docker', fn () => new Docker());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('containsInsensitive', function ($haystack, $needles) {
            foreach ((array) $needles as $needle) {
                if ($needle !== '' && mb_stripos($haystack, $needle) !== false) {
                    return true;
                }
            }

            return false;
        });
    }
}
