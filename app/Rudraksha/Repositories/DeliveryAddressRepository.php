<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 12:16 PM
 */

namespace App\Http\Rudraksha\Repositories;


use App\Rudraksha\Entities\DeliveryAddress;

class DeliveryAddressRepository
{
    /**
     * @var DeliveryAddress
     */
    private $deliveryAddress;

    public function __construct(DeliveryAddress $deliveryAddress)
    {
        $this->deliveryAddress = $deliveryAddress;
    }

}