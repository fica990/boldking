<?php


namespace App\Services;


use App\Models\Order;
use App\Models\Subscription;
use App\Repositories\Delivery\DeliveryRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use http\Exception;
use Illuminate\Support\Carbon;

class OrderService
{
    private $orderRepository;
    private $subscriptionRepository;
    private $deliveryRepository;

    /**
     * OrderService constructor.
     * @param OrderRepositoryInterface $orderRepository
     * @param SubscriptionRepositoryInterface $subscriptionRepository
     * @param DeliveryRepositoryInterface $deliveryRepository
     */
    public function __construct(
        OrderRepositoryInterface $orderRepository,
        SubscriptionRepositoryInterface $subscriptionRepository,
        DeliveryRepositoryInterface $deliveryRepository
    )
    {
        $this->orderRepository = $orderRepository;
        $this->subscriptionRepository = $subscriptionRepository;
        $this->deliveryRepository = $deliveryRepository;
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
        $this->updateSubscriptionNextOrderDate($data['subscription']);

        return ['success' => true, 'model' => $newOrder];
    }


    public function getLastPaidOrder(int $customerId)
    {
        return $this->orderRepository->findBy(['customer_id' => $customerId, 'status' => Order::STATUS_PAID], '-paid_date', true);
    }


    public function payOrder(int $orderId)
    {
        $data = [
            'status' => Order::STATUS_PAID,
            'paid_date' => Carbon::now()->toDateString()
        ];

        $order = $this->orderRepository->find($orderId);

        if (!$order || $order->status === Order::STATUS_PAID) {
            return ['success' => false, 'error' => 'Order not found or already paid'];
        }

        $updatedOrder = $this->orderRepository->update($data, $order);

        //create new delivery
        $newDelivery = $this->deliveryRepository->create([
            'order_id' => $orderId,
        ]);

        return ['success' => true, 'order' => $updatedOrder, 'new_delivery' => $newDelivery];
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

    private function updateSubscriptionNextOrderDate(Subscription $subscription): void
    {
        $nextOrderDate = Carbon::make($subscription->nextorder_date);
        $addedDays = $nextOrderDate->addDays($subscription->day_iteration);

        $this->subscriptionRepository->update(['nextorder_date' => $addedDays->toDateString()], $subscription->id);
    }
}
