<?php

declare(strict_types=1);

namespace Blue32a\Laravel\Language;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../resources/lang' => $this->app->resourcePath('lang/'),
            ], 'blue32a-lang');
        }
    }
}
