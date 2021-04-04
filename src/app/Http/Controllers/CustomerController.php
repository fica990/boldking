<?php

namespace App\Http\Controllers;

use App\Services\CustomerService;
use Illuminate\Http\JsonResponse;

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


    public function getCustomersWithMultiplePaidOrders(): JsonResponse
    {
        $customers = $this->customerService->getCustomersWithMultiplePaidOrders();

        return new JsonResponse($customers, 200);
    }


    public function getSubbedCustomersWithPaidOrders(): JsonResponse
    {
        $customers = $this->customerService->getSubbedCustomersWithPaidOrders();

        return new JsonResponse($customers, 200);
    }
}
