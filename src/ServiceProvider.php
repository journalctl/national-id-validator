<?php

namespace Journalctl\NationalIdValidator;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

/**
 * Class ServiceProvider
 * @package Journalctl\NationalIdValidator
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $app = $this->app;

        $app['validator']->extend('national_id', function ($attribute, $value) use ($app) {
            return $app['national_id']->passes($attribute, $value);
        });
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('national_id', function ($app) {
            return new NationalIdValidator();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['national_id'];
    }
}
