<?php

namespace App\Providers;

use App\Repositories\CurrenciesRepository;
use App\Repositories\LBCurrenciesRepository;
use App\Repositories\SwedbankCurrenciesRepository;
use Illuminate\Support\ServiceProvider;

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
        $this->app->bind(CurrenciesRepository::class,
            function () {
                return new LBCurrenciesRepository();
            });
    }
}
