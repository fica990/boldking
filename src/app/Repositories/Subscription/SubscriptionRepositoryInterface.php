<?php


namespace App\Repositories\Subscription;


use Illuminate\Database\Eloquent\Model;

interface SubscriptionRepositoryInterface
{
    public function update(array $data, int $subscriptionId): Model;
}
