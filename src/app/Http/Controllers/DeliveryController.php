<?php

namespace App\Http\Controllers;

use App\Services\DeliveryService;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DeliveryController extends Controller
{
    private $deliveryService;

    /**
     * CustomerController constructor.
     * @param $deliveryService
     */
    public function __construct(DeliveryService $deliveryService)
    {
        $this->deliveryService = $deliveryService;
    }

    public function exportDeliveries(): StreamedResponse
    {
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=deliveries.csv",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );

        $callback = function () {
            $this->deliveryService->exportData();
        };

        return response()->stream($callback, 200, $headers);
    }
}
