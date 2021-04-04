<?php


namespace App\Repositories\Delivery;


use Illuminate\Database\Eloquent\Model;

interface DeliveryRepositoryInterface
{
    public function create(array $data): Model;
}
