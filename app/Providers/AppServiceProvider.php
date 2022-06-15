<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Event\EventInterface;
use App\Repositories\Event\EventRepository;
use App\Repositories\MenuItem\MenuItemInterface;
use App\Repositories\MenuItem\MenuItemRepository;

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
        $this->app->bind(MenuItemInterface::class, MenuItemRepository::class);
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
