<?php

namespace App\Providers;

use App\Services\ShortLink\ShortLinkService;
use App\Services\ShortLink\ShortLinkServiceInterface;
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
        $this->app->bind(ShortLinkServiceInterface::class, ShortLinkService::class);
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
