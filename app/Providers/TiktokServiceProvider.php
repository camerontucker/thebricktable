<?php

namespace App\Providers;

use App\Services\TiktokService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class TiktokServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register() : void
    {
        $this->app->singleton(TiktokServiceProvider::class, fn() => new TiktokService());
    }

    public function provides()
    {
        return [TiktokService::class];
    }
}
