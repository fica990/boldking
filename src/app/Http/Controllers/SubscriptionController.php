<?php

namespace App\Http\Controllers;

use App\Services\SubscriptionService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    private $subscriptionService;

    /**
     * SubscriptionController constructor.
     * @param $subscriptionService
     */
    public function __construct(SubscriptionService $subscriptionService)
    {
        $this->subscriptionService = $subscriptionService;
    }

    public function updateSubscription(Request $request)
    {
        $customerId = $request->route('id');
        $requestData = $request->input();

        $result = $this->subscriptionService->updateIteration($customerId, $requestData);

        if (!$result['success']) {
            return new JsonResponse($result['error'], 404);
        }

        return new JsonResponse($result['model']);
    }
}
