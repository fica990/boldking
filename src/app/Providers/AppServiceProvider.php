<?php

namespace App\Providers;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\Customer\EloquentCustomerRepository;
use App\Repositories\Order\EloquentOrderRepository;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Subscription\EloquentSubscriptionRepository;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CustomerRepositoryInterface::class, EloquentCustomerRepository::class);
        $this->app->singleton(SubscriptionRepositoryInterface::class, EloquentSubscriptionRepository::class);
        $this->app->singleton(OrderRepositoryInterface::class, EloquentOrderRepository::class);
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
