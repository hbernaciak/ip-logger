<?php

namespace Hbernaciak\IpLogger;

use Illuminate\Foundation\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class IpLoggerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Kernel $kernel)
    {
        $this->publishes([
            __DIR__ . '/migrations' => database_path('migrations')
        ], 'migrations');

        $kernel->prependMiddleWare(Hbernaciak\IpLogger\IpLoggerMiddleware::class);
        new IpLoggerMiddleware();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
