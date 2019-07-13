<?php

namespace Nour\Images\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
class ImagesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->registerBladeExtensions();
    }

    protected function registerBladeExtensions()
    {

    }
}
