<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Pangu\Common\JavaScript\JavaScript;
use Pangu\Metadata\MetadataGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JavaScript::init();
        MetadataGenerator::init();
    }
}
