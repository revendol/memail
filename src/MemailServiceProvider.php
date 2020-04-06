<?php

namespace Radoan\Memail;

use Illuminate\Support\ServiceProvider;

class MemailServiceProvider extends ServiceProvider{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','memail');
        $this->loadViewsFrom(__DIR__.'/Mail/views','master-mail');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'/vendor/memail' => public_path('vendor/memail')
        ], 'public');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/memail')
        ], 'views');
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');
    }

    public function register()
    {
        $this->app->bind('Radoan\Memail',function (){
            return new Memail();
        });
    }
}
