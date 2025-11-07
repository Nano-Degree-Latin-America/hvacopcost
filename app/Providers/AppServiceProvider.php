<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PeriodoCalculatorInterface;
use App\Services\AshraePeriodoCalculator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PeriodoCalculatorInterface::class, AshraePeriodoCalculator::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
