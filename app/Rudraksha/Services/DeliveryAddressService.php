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
        $x=explode(',',$formData['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $formData['latitude_long']= $t;

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
        $x=explode(',',$request['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $request['latitude_long']= $t;
        $request = array_except($request, ['_token', 'to', 'remove']);
        return $this->deliveryAddressRepository->updateDelivery($request,$id);

    }

}