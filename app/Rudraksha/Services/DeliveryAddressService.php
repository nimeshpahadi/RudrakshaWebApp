<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 12:13 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\DeliveryAddressRepository;

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

    public function store_delivery($request)
    {
        $formData = $request->all();
        return $this->deliveryAddressRepository->storeDelivery($formData);
    }

    public function getdelivery($userid)
    {
        return $this->deliveryAddressRepository->getDeliveryId($userid);
    }

    public function getdeliverybyId($id)
    {
        return $this->deliveryAddressRepository->getdeliverybyId($id);
    }

    public function update_delivery($request, $id)
    {
        $formData = $request->all();
        return $this->deliveryAddressRepository->updateDelivery($formData,$id);

    }

}