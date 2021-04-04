<?php


namespace App\Services;


use App\Repositories\Delivery\DeliveryRepositoryInterface;
use App\Utility\CSVDataExport;

class DeliveryService
{
    private $deliveryRepository;
    private $csvExportService;

    /**
     * DeliveryService constructor.
     * @param DeliveryRepositoryInterface $deliveryRepository
     * @param CSVDataExport $csvExportService
     */
    public function __construct(DeliveryRepositoryInterface $deliveryRepository, CSVDataExport $csvExportService)
    {
        $this->deliveryRepository = $deliveryRepository;
        $this->csvExportService = $csvExportService;
    }

    public function exportData()
    {
        //get all deliveries
        $deliveries = $this->deliveryRepository->all();

        $this->csvExportService->exportData($deliveries->toArray());
    }


}
