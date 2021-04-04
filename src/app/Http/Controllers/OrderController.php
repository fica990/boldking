<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;

    /**
     * OrderController constructor.
     * @param $orderService
     */
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function create(): JsonResponse
    {
        $result = $this->orderService->create();

        if (!$result['success']) {
            return new JsonResponse($result['error'], $result['code']);
        }

        return new JsonResponse($result['model'], 201);
    }


    public function getLastPaidOrder(Request $request): JsonResponse
    {
        $customerId = $request->route('id');

        $order = $this->orderService->getLastPaidOrder($customerId);

        return new JsonResponse($order, 200);
    }


    public function payOrder(Request $request): JsonResponse
    {
        $orderId = $request->route('id');
        $result = $this->orderService->payOrder($orderId);

        if (!$result['success']) {
            return new JsonResponse($result['error'], 422);
        }

        return new JsonResponse($result, 200);
    }
}
