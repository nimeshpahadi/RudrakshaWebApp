<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 11:01 AM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\Rudraksha\Entities\CustomerAddress;
use Illuminate\Contracts\Logging\Log;

class CustomerAddressApiRepository
{
    /**
     * @var CustomerAddress
     */
    private $customerAddress;
    /**
     * @var Log
     */
    private $log;

    /**
     * CustomerAddressApiRepository constructor.
     * @param CustomerAddress $customerAddress
     * @param Log $log
     */
    public function __construct(CustomerAddress $customerAddress, Log $log)
    {
        $this->customerAddress = $customerAddress;
        $this->log = $log;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function repoCustomerAddressCreate($data)
    {
        return $this->customerAddress->create($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function repoCustomerAddressShow($id)
    {
        return $this->customerAddress->select('*')
                            ->where('customer_id', $id)
                            ->first();
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     */
    public function repoCustomerAddressEdit($request, $id)
    {
        try {
            $data = CustomerAddress::find($id);
            $data->country = $request['country'];
            $data->state = $request['state'];
            $data->street = $request['street'];
            $data->contact = $request['contact'];
            $data->latitude_long = $request['latitude_long'];
            $data->update();
            $this->log->info("Customer Address Updated");
            return true;

        } catch (QueryException $e) {

            $this->log->error("Customer Address Update Failed : ", [$e->getMessage()]);
            return false;
        }
    }
}