<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 12:16 PM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\DeliveryAddress;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class DeliveryAddressRepository
{
    /**
     * @var DeliveryAddress
     */
    private $deliveryAddress;
    /**
     * @var Log
     */
    private $log;

    public function __construct(DeliveryAddress $deliveryAddress,Log $log)
    {
        $this->deliveryAddress = $deliveryAddress;
        $this->log = $log;
    }

    public function storeDelivery($formData)
    {
        try {
            $this->deliveryAddress->create($formData);
            $this->log->info("Delivery Address Created");
            return true;
        } catch (QueryException $e) {
            $this->log->error("Delivery Address Creation Failed %s", [$e->getMessage()]);
            return false;
        }

    }

    public function getDeliveryId($userid)
    {
        return $this->deliveryAddress->select('*')->where('customer_id',$userid)->first();
    }

    public function getdeliverybyId($id)
    {
        return $this->deliveryAddress->select('*')->where('id',$id)->first();
    }

    public function updateDelivery($request, $id)
    {
        try {
            $formData=$request->all();
            $data = DeliveryAddress::find($id);

            $data->country = $formData['country'];
            $data->state = $formData['state'];
            $data->city = $formData['city'];
            $data->contact = $formData['contact'];
            $data->latitude_long = $formData['latitude_long'];
            $data->address_line1 = $formData['address_line1'];
            $data->address_line2 = $formData['address_line2'];
            $data->zip_code = $formData['zip_code'];
            $data->address_note = $formData['address_note'];
            $data->update();
            $this->log->info("Delivery Address Updated", ['id' => $id]);

            return true;
        } catch (QueryException $e) {
            $this->log->error("Delivery address Update Failed %s", ['id' => $id], [$e->getMessage()]);
            return false;
        }
    }

}