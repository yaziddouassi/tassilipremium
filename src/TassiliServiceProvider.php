<?php

namespace Tassili\Premium;

use Illuminate\Support\ServiceProvider;

class TassiliServiceProvider extends ServiceProvider
{
   
    public function register(): void
    {
     $this->publishes([
            __DIR__.'/../config/tassili.php' => config_path('tassili.php'),
        ], 'tassili-config');

        $this->mergeConfigFrom(
            __DIR__.'/../config/tassili.php', 'tassili'
        );
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

           $this->commands([
            \Tassili\Premium\Commands\PanelCreator::class,
            \Tassili\Premium\Commands\TassiliCreator::class,
            \Tassili\Premium\Commands\CreateUser::class,
            \Tassili\Premium\Commands\CrudCommand::class,
            \Tassili\Premium\Commands\WizardCommand::class,
        ]);
    }
}