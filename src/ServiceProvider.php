<?php

namespace Blue32a\Laravel\Language;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/lang' => $this->app->resourcePath('lang/'),
            ], 'blue32a-lang');
        }
    }
}
