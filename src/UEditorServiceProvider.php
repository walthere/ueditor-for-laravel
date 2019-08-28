<?php

namespace Walthere\UEditor;

use Illuminate\Support\ServiceProvider;

class UEditorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (! $this->app->routesAreCached()) {
            require __DIR__.'/routes.php';
        }

        $configPath = realpath(__DIR__ . '/config/UEditor.php');
        $this->mergeConfigFrom($configPath, 'UEditor');
        $this->publishes([$configPath => config_path('UEditor.php')], 'config');

        $viewPath = realpath(__DIR__ . '/views');
        $this->loadViewsFrom($viewPath, 'UEditor');
        $this->publishes([
            realpath(__DIR__ . '/views') => base_path('resources/views/vendor/UEditor'),
        ], 'view');
        $this->publishes([
            realpath(__DIR__ . '/resources') => public_path() . '/assets/js/UEditor',
        ], 'assets');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = realpath(__DIR__ . '/../config/UEditor.php');
       // $this->mergeConfigFrom($configPath, 'UEditorUpload');
       // $this->publishes([$configPath => config_path('UEditorUpload.php')], 'config');
    }
}
