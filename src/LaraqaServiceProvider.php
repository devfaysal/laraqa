<?php

namespace Devfaysal\Laraqa;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Devfaysal\Laraqa\Http\Controllers\QuestionController;

class LaraqaServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {

        Route::middleware(['web'])->group(function () {

            Route::get('/questions', [QuestionController::class, 'index']);
            Route::get('/questions/create', [QuestionController::class, 'create']);
            Route::post('/questions', [QuestionController::class, 'store']);

        });

        /*
         * Optional methods to load your package assets
         */

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'laraqa');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laraqa.php'),
            ], 'config');

            // Publishing the views.
            $this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laraqa'),
            ], 'views');

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laraqa'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laraqa'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'laraqa');

        // Register the main class to use with the facade
        $this->app->singleton('laraqa', function () {
            return new Laraqa;
        });
    }
}
