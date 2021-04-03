<?php


namespace App\Repositories\Customer;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CustomerRepositoryInterface
{
    public function all(): Collection;

    public function show(int $customerId): Model;

    public function getCustomersWithMultiplePaidOrders(): Collection;

    public function getCustomers(): Collection;
}
