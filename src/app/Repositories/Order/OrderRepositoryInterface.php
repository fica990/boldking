<?php


namespace App\Repositories\Order;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrderRepositoryInterface
{
    public function create(array $data): Model;
}
