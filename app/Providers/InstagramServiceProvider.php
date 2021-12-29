<?php

namespace App\Providers;

use App\Services\InstagramService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class InstagramServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register() : void
    {
        $this->app->singleton(InstagramServiceProvider::class, fn() => new InstagramService());
    }

    public function provides()
    {
        return [InstagramService::class];
    }
}
