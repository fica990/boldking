<?php


namespace App\Repositories\Subscription;


use App\Models\Subscription;
use App\Repositories\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentSubscriptionRepository extends EloquentBaseRepository implements SubscriptionRepositoryInterface
{
    public function updateSubscription(array $data, Subscription $subscription): Model
    {
        $subscription->fill($data)->save();

        return $subscription;
    }

    protected function getModelResource(): string
    {
        return Subscription::class;
    }
}
