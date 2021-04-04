<?php


namespace App\Repositories\Customer;


use Illuminate\Database\Eloquent\Collection;

interface CustomerRepositoryInterface
{
    public function getCustomersWithMultiplePaidOrders(): Collection;

    public function getCustomers(): Collection;
}
