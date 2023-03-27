<?php
namespace Alvin0\RedisModel;

use Illuminate\Support\ServiceProvider;

class RedisModelServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (!app()->configurationIsCached()) {
            $this->mergeConfigFrom(__DIR__ . '/config/redis-model.php', 'redis-model');
        }

        config([
            'database.redis' => array_merge(config('redis-model.database'), config('database.redis', [])),
        ]);
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
