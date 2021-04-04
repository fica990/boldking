<?php


namespace App\Repositories\Order;


use App\Models\Order;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentOrderRepository extends EloquentBaseRepository implements OrderRepositoryInterface
{
    public function create(array $data): Model
    {
        $newOrder = new Order($data);
        $newOrder->saveOrFail();

        return $newOrder;
    }


    public function update(array $data, Order $order): Model
    {
        $order->fill($data)->save();

        return $order;
    }


    protected function getModelResource(): string
    {
        return Order::class;
    }
}
