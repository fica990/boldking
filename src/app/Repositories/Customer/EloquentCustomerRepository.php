<?php


namespace App\Repositories\Customer;


use App\Models\Customer;
use App\Models\Order;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentCustomerRepository extends EloquentBaseRepository implements CustomerRepositoryInterface
{
    public function all(): Collection
    {
//        return $this->model::all();
        return $this->model->all();
    }


    public function show(int $customerId): Model
    {
        return $this->model->with('orders')->findOrFail($customerId);
    }


    public function getCustomersWithMultiplePaidOrders(): Collection
    {
        return $this->model::whereHas('orders', function ($query) {
            $query->where('status', Order::STATUS_PAID);
        }, '>', 1)->get();
    }


    public function getCustomers(): Collection
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
