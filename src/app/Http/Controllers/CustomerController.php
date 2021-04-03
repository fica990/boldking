<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    private $customerService;

    /**
     * CustomerController constructor.
     * @param $customerService
     */
    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }


    public function all()
    {
        return new JsonResponse($this->customerService->all());
    }


    public function getCustomersWithMultiplePaidOrders()
    {
        $customers = $this->customerService->getCustomersWithMultiplePaidOrders();

        return new JsonResponse($customers, 200);
    }


    public function getCustomers()
    {
        $customers = $this->customerService->getCustomers();

        return new JsonResponse($customers, 200);
    }
}
