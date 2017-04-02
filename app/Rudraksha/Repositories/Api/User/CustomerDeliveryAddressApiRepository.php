<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 12:39 PM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\Rudraksha\Entities\DeliveryAddress;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class CustomerDeliveryAddressApiRepository
{
    /**
     * @var DeliveryAddress
     */
    private $deliveryAddress;
    /**
     * @var Log
     */
    private $log;

    /**
     * CustomerDeliveryAddressApiRepository constructor.
     * @param DeliveryAddress $deliveryAddress
     * @param Log $log
     */
    public function __construct(DeliveryAddress $deliveryAddress, Log $log)
    {
        $this->deliveryAddress = $deliveryAddress;
        $this->log = $log;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function repoCustomerDeliveryAddressCreate($data)
    {
        try {
            $this->log->info("Customer Delivery Address Created");
            return $this->deliveryAddress->create($data);

        } catch (QueryException $e) {
            $this->log->error("Customer Delivery Address Create Failed : ", [$e->getMessage()]);
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function repoCustomerDeliveryAddressShow($id)
    {
        return $this->deliveryAddress->select('*')
                        ->where('customer_id', $id)
                        ->first();
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     */
    public function repoCustomerDeliveryAddressEdit($request, $id)
    {
        try {
            $data = DeliveryAddress::find($id);
            $data->country = $request['country'];
            $data->state = $request['state'];
            $data->latitude_long = $request['latitude_long'];
            $data->city = $request['city'];
            $data->address_line1 = $request['address_line1'];
            $data->address_line2 = $request['address_line2'];
            $data->zip_code = $request['zip_code'];
            $data->update();

            $this->log->info("Customer Delivery Address Updated");

            return true;

        } catch (QueryException $e) {
            $this->log->error("Customer Delivery Address Update Failed : ", [$e->getMessage()]);
            return false;
        }
    }
}