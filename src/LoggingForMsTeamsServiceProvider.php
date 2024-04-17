<?php

namespace Kiprasbiel\LoggingForMsTeams;

use Illuminate\Support\ServiceProvider;

class LoggingForMsTeamsServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/logging-for-ms-teams.php', 'logging.channels');

        $this->app->singleton(LoggingForMsTeams::class, function ($app) {
            return new LoggingForMsTeams;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['logging-for-ms-teams'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        $this->publishes([
            __DIR__.'/../config/logging-for-ms-teams.php' => config_path('logging-for-ms-teams.php'),
        ], 'logging-for-ms-teams.config');
    }
}
