<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 12:13 PM
 */

namespace App\Http\Rudraksha\Services;


use App\Http\Rudraksha\Repositories\DeliveryAddressRepository;

class DeliveryAddressService
{
    /**
     * @var DeliveryAddressRepository
     */
    private $deliveryAddressRepository;

    public function __construct(DeliveryAddressRepository $deliveryAddressRepository)
    {
        $this->deliveryAddressRepository = $deliveryAddressRepository;
    }

}