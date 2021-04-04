<?php


namespace App\Repositories\Delivery;


use App\Models\Customer;
use App\Models\Delivery;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentDeliveryRepository extends EloquentBaseRepository implements DeliveryRepositoryInterface
{
    public function create(array $data): Model
    {
        $newDelivery = new Delivery($data);
        $newDelivery->saveOrFail();

        return $newDelivery;
    }


    protected function getModelResource(): string
    {
        return Customer::class;
    }
}
