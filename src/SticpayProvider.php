<?php

namespace Vikramwps\Sticpay;

use Illuminate\Support\ServiceProvider;

class SticpayProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views', 'sticpay');
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');
        $this->mergeConfigFrom(__DIR__.'/config/sticpay.php', 'sticpay');
        $this->publishes([
            __DIR__.'/config/sticpay.php' => config_path('sticpay.php'),
        ]);
    }
}
