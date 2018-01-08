<?php

namespace Matthewbdaly\LaravelBlog\Providers;

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
        // Register the TSVECTOR column
        $conn = $this->app->make('Illuminate\Database\ConnectionInterface');
        $conn->getDoctrineSchemaManager()
            ->getDatabasePlatform()
            ->registerDoctrineTypeMapping('tsvector', 'string');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Matthewbdaly\LaravelBlog\Contracts\Repositories\Post', function () {
            $baseRepo = new \Matthewbdaly\LaravelBlog\Eloquent\Repositories\Post(new \Matthewbdaly\LaravelBlog\Eloquent\Models\Post);
            $cachingRepo = new \Matthewbdaly\LaravelBlog\Eloquent\Repositories\Decorators\Post($baseRepo, $this->app['cache.store']);
            return $cachingRepo;
        });
    }
}
