<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Shankl\Interfaces\ChildRepoInterface;
use Shankl\Repositories\ChildRepository;

class ParentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(ChildRepoInterface::class , ChildRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
