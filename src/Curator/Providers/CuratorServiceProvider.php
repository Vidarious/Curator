<?php

/**
 * Curator's primary Laravel service provider. Be sure to add this provider
 * to your <laravel-install>/config/app.php to allow this app to hook in.
 */

namespace Curator\Providers;

use Illuminate\Support\ServiceProvider;

class CuratorServiceProvider extends ServiceProvider
{
    /**
     * A list of Curator's Artisan commands.
     *
     * @var array
     */
    protected $curatorCommands =
    [
        \Curator\Console\InitCuratorCommand::class
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //Register Curator's commands with Artisan.
        $this->commands($this->curatorCommands);
    }
}
