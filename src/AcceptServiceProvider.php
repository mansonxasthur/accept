<?php

namespace MX13\Accept;

use Illuminate\Support\ServiceProvider;
use MX13\Accept\Console\Commands\AcceptEnv;

class AcceptServiceProvider extends ServiceProvider
{
    const DS = DIRECTORY_SEPARATOR;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . self::DS . 'config' . self::DS . 'accept.php', 'accept'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . self::DS . 'config' . self::DS . 'accept.php' => config_path('accept.php'),
        ], 'accept-config');

        if ($this->app->runningInConsole()) {
            $this->commands([
                AcceptEnv::class,
            ]);
        }
    }
}
