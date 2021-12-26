<?php

namespace App\Providers;

use App\Services\YoutubeService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class YoutubeServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public function register() : void
    {
        $this->app->singleton(YoutubeServiceProvider::class, fn() => new YoutubeService());
    }

    public function provides()
    {
        return [YoutubeService::class];
    }
}
