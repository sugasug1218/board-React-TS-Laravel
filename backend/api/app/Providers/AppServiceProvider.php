<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use packages\UseCase\Post\Create\PostCreateUseCaseInterface;
use packages\UseCase\Post\Create\PostCreateInteractor;
use packages\Domain\Domain\Post\PostRepositoryInterface;
use packages\Infrastructure\Post\PostRepository;

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
        // Users
        // app()


        // Post
        app()->bind(PostCreateUseCaseInterface::class, function ($app) {
            return $app->make(PostCreateInteractor::class);
        });

        app()->bind(PostRepositoryInterface::class, function ($app) {
            return $app->make(PostRepository::class);
        });
    }
}
