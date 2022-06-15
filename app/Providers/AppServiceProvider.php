<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Event\EventInterface;
use App\Repositories\Event\EventRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventInterface::class, EventRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
