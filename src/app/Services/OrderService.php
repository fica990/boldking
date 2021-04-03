<?php


namespace App\Services;


use App\Models\Order;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use http\Exception;
use Illuminate\Support\Carbon;

class OrderService
{
    private $orderRepository;
    private $subscriptionRepository;

    /**
     * OrderService constructor.
     * @param OrderRepositoryInterface $orderRepository
     * @param SubscriptionRepositoryInterface $subscriptionRepository
     */
    public function __construct(OrderRepositoryInterface $orderRepository, SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->subscriptionRepository = $subscriptionRepository;
    }


    public function create()
    {
        $data = $this->getSubscriptionForOrderData();

        if (!$data) {
            return ['success' => false, 'error' => 'No subscription found', 'code' => 404];
        }

        try {
            $newOrder = $this->orderRepository->create($data['values']);
        } catch (Exception $e) {
            return ['success' => false, 'error' => $e->getMessage(), 'code' => $e->getCode()];
        }

        //update subs next date
        $nextOrderDate = Carbon::make($data['subscription']->nextorder_date);
        $addedDays = $nextOrderDate->addDays($data['subscription']->day_iteration);

        $this->subscriptionRepository->updateSubscription(['nextorder_date' => $addedDays->format('Y-m-d')], $data['subscription']);

        return ['success' => true, 'model' => $newOrder];
    }


    public function getLastPaidOrder(int $customerId)
    {
        return $this->orderRepository->findBy(['customer_id' => $customerId, 'status' => Order::STATUS_PAID], '-paid_date', true);
    }


    public function getMultiplePaidOrders()
    {
        
    }


    private function getSubscriptionForOrderData(): ?array
    {
        $subscription = $this->subscriptionRepository->findBy(['active' => 1], 'nextorder_date', true);

        if (!$subscription) {
            return null;
        }

        return [
            'values' => [
                'customer_id' => $subscription->customer_id,
                'subscription_id' => $subscription->id,
                'status' => Order::STATUS_CREATED,
                'total' => rand(10, 100),
                'paid_date' => null,
            ],
            'subscription' => $subscription
        ];
    }
}
