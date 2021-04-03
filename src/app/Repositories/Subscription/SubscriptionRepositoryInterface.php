<?php


namespace App\Repositories\Subscription;


use App\Models\Subscription;
use Illuminate\Database\Eloquent\Model;

interface SubscriptionRepositoryInterface
{
    public function updateSubscription(array $data, Subscription $subscription): Model;
}
