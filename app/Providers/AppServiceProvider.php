<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Interfaces\ProfileInterface',
            'App\Repository\ProfileRepo'
        );

        $this->app->bind(
            'App\Interfaces\AdsInterface',
            'App\Repository\AdsRepo'
        );

        $this->app->bind(
            'App\Interfaces\AdsCommentInterface',
            'App\Repository\AdsCommentRepo'
        );

        $this->app->bind(
            'App\Interfaces\SearchInterface',
            'App\Repository\SearchRepo'
        );

        $this->app->bind(
            'App\Interfaces\NotificationInterface',
            'App\Repository\NotificationRepo'
        );
    }
}
