<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 12:39 PM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\Rudraksha\Entities\DeliveryAddress;

class CustomerDeliveryAddressApiRepository
{
    /**
     * @var DeliveryAddress
     */
    private $deliveryAddress;

    /**
     * CustomerDeliveryAddressApiRepository constructor.
     * @param DeliveryAddress $deliveryAddress
     */
    public function __construct(DeliveryAddress $deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

    public function repoCustomerDeliveryAddressCreate($data)
    {
        return $this->deliveryAddress->create($data);
    }
}