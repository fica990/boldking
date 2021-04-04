<?php


namespace App\Services;


use App\Repositories\Subscription\SubscriptionRepositoryInterface;

class SubscriptionService
{
    private $subscriptionRepository;

    /**
     * SubscriptionService constructor.
     * @param $subscriptionRepository
     */
    public function __construct(SubscriptionRepositoryInterface $subscriptionRepository)
    {
        $this->subscriptionRepository = $subscriptionRepository;
    }


    public function updateIteration(int $customerId, array $data)
    {
        $subscriptionToUpdate = $this->subscriptionRepository->findBy(['customer_id' => $customerId], null, true);

        if (!$subscriptionToUpdate) {
            return ['success' => false, 'error' => 'Subscription not found'];
        }

        $updatedSubscription = $this->subscriptionRepository->update($data, $subscriptionToUpdate->id);

        return ['success' => true, 'model' => $updatedSubscription];
    }


}
