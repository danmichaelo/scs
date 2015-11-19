<?php

namespace App\Providers;

use Guzzle\Http\Client as HttpClient;
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
        $this->app->singleton('BCLib\PrimoServices\Availability\AlmaClient', function ($app) {
            return new \BCLib\PrimoServices\Availability\AlmaClient(
                new HttpClient(),
                config('app.alma.host'),
                config('app.alma.institution')
            );
        });

        $this->app->singleton('BCLib\PrimoServices\PrimoServices', function ($app) {
            return new \BCLib\PrimoServices\PrimoServices(
                config('app.primo.host'),
                config('app.primo.institution')
            );
        });
    }
}
