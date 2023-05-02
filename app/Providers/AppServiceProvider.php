<?php

namespace App\Providers;

use Shankl\Services\FileService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Shankl\Interfaces\EventRepoInerface;
use Shankl\Repositories\EventRepository;
use Shankl\Repositories\GradeRepository;
use Shankl\Interfaces\EventRepoInterface;
use Shankl\Interfaces\GradeRepoInterface;
use Shankl\Interfaces\FileServiceInterface;
use Shankl\Repositories\LocationRepository;
use Shankl\Interfaces\LocationRepoInterface;
use Shankl\Repositories\EduSystemRepository;
use Shankl\Interfaces\EduSystemRepoInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        app()->bind(LocationRepoInterface::class , LocationRepository::class);
        app()->bind(GradeRepoInterface::class , GradeRepository::class);
        app()->bind(EduSystemRepoInterface::class , EduSystemRepository::class);
        app()->bind(FileServiceInterface::class , FileService::class);
        app()->bind(EventRepoInterface::class , EventRepository::class);
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
