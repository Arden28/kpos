<?php

namespace Modules\Subby\Services\PaymentMethod;

use Bmatovu\MtnMomo\Exceptions\CollectionRequestException;
use Bpuig\Subby\Contracts\PaymentMethodService;
use Bank\BankPackages\YourPaymentProcessor;
use Bmatovu\MtnMomo\Products\Collection;
use Bpuig\Subby\Traits\IsPaymentMethod;

class MomoPay implements PaymentMethodService
{
    use IsPaymentMethod;

    private $amount;
    private $phone;
    private $creditCard;


    /**
     * You would need to retrieve whatever data you need from $this->subscription relationships
     * @return void
     */
    private function retrieveMomoPay() {
        // $this->creditCard = $this->subscription->user->creditCards()->default;
     }


    public function charge(){

        try {
            $collection = new Collection();

            $collection->requestToPay('012345', $this->phone, $this->amount);

        } catch(CollectionRequestException $e) {
            do {
                printf("\n\r%s:%d %s (%d) [%s]\n\r",
                    $e->getFile(), $e->getLine(), $e->getMessage(), $e->getCode(), get_class($e));
            } while($e = $e->getPrevious());
        }
    }

}
