<?php


namespace App\Services;


use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerService
{
    private $customerRepository;

    /**
     * CustomerService constructor.
     * @param $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }


    public function getCustomersWithMultiplePaidOrders()
    {
        return $this->customerRepository->getCustomersWithMultiplePaidOrders();
    }


    public function getSubbedCustomersWithPaidOrders()
    {
        return $this->customerRepository->getSubbedCustomersWithPaidOrders();
    }


}
