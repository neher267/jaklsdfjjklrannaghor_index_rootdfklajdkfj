<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;

class MorphServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'category' => 'App\Models\Settings\Category',
            'product' => 'App\Models\Hr\Product',
            'package' => 'App\Models\Hr\Package',
            'gift' => 'App\Models\Settings\Gift',
            'mix-products' => 'App\Models\Hr\MixProducts',
            'mix-package' => 'App\Models\Hr\MixPackage',


            ]);
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
