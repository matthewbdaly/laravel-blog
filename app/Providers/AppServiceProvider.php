<?php

namespace LaravelBlog\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('LaravelBlog\Contracts\Repositories\Post', function () {
            $baseRepo = new \LaravelBlog\Eloquent\Repositories\Post(new \LaravelBlog\Eloquent\Models\Post);
            $cachingRepo = new \LaravelBlog\Eloquent\Repositories\Decorators\Post($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
