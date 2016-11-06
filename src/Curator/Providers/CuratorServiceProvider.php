<?php

/*
|--------------------------------------------------------------------------
| Curator: Service Provider
|--------------------------------------------------------------------------
|
| This is Curator's primary service provider for Laravel. Be sure to add
| this provider in your config/app.php file of your Laravel installation.
|
*/

namespace Curator\Providers;

use Illuminate\Support\ServiceProvider;

class CuratorServiceProvider extends ServiceProvider
{
    //List of Curator's commands.
    protected $curatorCommands =
        [
            \Curator\Console\CuratorInit::class
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
