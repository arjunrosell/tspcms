<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('time_between', function ($attribute, $value, $parameters, $validator) {
            $startTime = strtotime($parameters[0]);
            $endTime = strtotime($parameters[1]);
            $inputTime = strtotime($value);
            return $inputTime >= $startTime && $inputTime <= $endTime;
        });
    }
}
