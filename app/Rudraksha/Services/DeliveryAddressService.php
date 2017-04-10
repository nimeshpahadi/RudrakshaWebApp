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
        $code= isset(config('country_code')[$formData["country"]])?config('country_code')[$formData["country"]]:"";
        $x=explode(',',$formData['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $formData['latitude_long']= $t;
        $formData['contact']=$code." ".$formData['contact'];

        return $this->deliveryAddressRepository->storeDelivery($formData);
    }

    public function getdelivery($userid)
    {
        return $this->deliveryAddressRepository->getDeliveryId($userid);
    }

    public function getdeliverybyId($id)
    {
        $data= $this->deliveryAddressRepository->getdeliverybyId($id);
        $realcontact = explode(" ", ($data->contact));
        $data->contact=$realcontact[1];
        return $data;
    }

    public function update_delivery($request, $id)
    {
        $formData=$request->all();
        $code= isset(config('country_code')[$formData["country"]])?config('country_code')[$formData["country"]]:"";
        $x=explode(',',$request['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $request['latitude_long']= $t;
        $request['contact']=$code." ".$formData['contact'];

        return $this->deliveryAddressRepository->updateDelivery($request,$id);

    }

}