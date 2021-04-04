<?php


namespace App\Repositories\Order;


use App\Models\Order;
use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function create(array $data): Model;

    public function update(array $data, Order $order): Model;
}
