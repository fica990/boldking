<?php


namespace App\Repositories\Customer;


use App\Models\Customer;
use App\Models\Order;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Collection;

class EloquentCustomerRepository extends EloquentBaseRepository implements CustomerRepositoryInterface
{
    public function getCustomersWithMultiplePaidOrders(): Collection
    {
        return $this->model::whereHas('orders', function ($query) {
            $query->where('status', Order::STATUS_PAID);
        }, '>', 1)->get();
    }


    public function getSubbedCustomersWithPaidOrders(): Collection
    {
        return $this->model::whereHas('orders', function ($query) {
            $query->where('status', Order::STATUS_PAID);
        }, '>', 0)->whereHas('subscription', function ($query) {
            $query->where('active', 1);
        })->get();
    }


    protected function getModelResource(): string
    {
        return Customer::class;
    }
}
