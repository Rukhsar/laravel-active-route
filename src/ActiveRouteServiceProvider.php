<?php

namespace Rukhsar\ActiveRoute;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Blade;

class ActiveRouteServiceProvider extends BaseServiceProvider
{

    // Indicates if the loading of provider deferred

    protected $defer = false;

    const PACKAGE_NAME = 'activeroute';

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Publish the config file
        $this->publishConfig();

        // Register Blade extensions
        $this->registerBladeExtensions();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Default package config
        $this->mergeConfig();

        // Register Singletion
        $this->app->singleton('active', function($app) {
            return new Active($app['router']->current()->getName());
        });
    }

    public function getTheLinkForHomePage()
    {

    }

    protected function publishConfig()
    {
        $this->publishes([
            $this->packagePath('config/config.php') =>  config_path(self::PACKAGE_NAME.'.php')
        ], 'config');
    }

    protected function registerBladeExtensions()
    {
        // Add custom blade directive @ifActiveRoute

        Blade::directive('ifActiveRoute', function ($expression) {

                return "<?php if (Active::route({$expression})): ?>";
        });
    }

    protected function mergeConfig()
    {
        $this->mergeConfigFrom($this->packagePath('config/config.php'), self::PACKAGE_NAME);
    }

    protected function packagePath($path = '')
    {
        return sprintf('%s/../%s', __DIR__, $path);
    }
}
