<?php


namespace App\Services;


use App\Models\Subscription;
use App\Repositories\Subscription\SubscriptionRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $subscriptionToUpdate = $this->subscriptionRepository->findBy(['customer_id' => $customerId], null, true);
        } catch (ModelNotFoundException $e) {
            return ['success' => false, 'error' => $e->getMessage()];
        }

        $updatedSubscription = $this->subscriptionRepository->updateSubscription($data, $subscriptionToUpdate);

        return ['success' => true, 'model' => $updatedSubscription];
    }


}
