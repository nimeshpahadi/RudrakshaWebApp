<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 11:56 AM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\CustomerAddress;
use App\User;
use Illuminate\Contracts\Logging\Log;
use Illuminate\Database\QueryException;

class CustomerAddressRepository
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
     * @var User
     */
    private $user;

    /**
     * CustomerAddressRepository constructor.
     * @param CustomerAddress $customerAddress
     * @param Log $log
     * @param User $user
     */
    public function __construct(CustomerAddress $customerAddress,
                                Log $log, User $user)
    {
        $this->customerAddress = $customerAddress;
        $this->log = $log;
        $this->user = $user;
    }

    /**
     * @param $request
     * @return bool
     */
    public function repoAddressStore($request)
    {
        try {
            $this->customerAddress->create($request);
            $this->log->info("Customer Address Created");
            return true;
        } catch (QueryException $e) {
            $this->log->error("Customer Address Creation Failed");
            return false;
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function repoCustomerAddress($id)
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
    public function repoAddressUpdate($request, $id)
    {
        try {
            $query = CustomerAddress::find($id);

            $query->country = $request->country;
            $query->state = $request->state;
            $query->street = $request->street;
            $query->city = $request->city;
            $query->contact = $request->contact;
            $query->latitude_long = $request->latitude_long;
            $query->update();
            $this->log->info("Customer Address Updated", ['id' => $id]);
            return true;

        } catch (QueryException $e) {
            $this->log->error("Customer Address Update Failed", ['id' => $id]);
            return false;
        }
    }

    public function getCustomerAddress($id)
    {
        return $this->customerAddress->select('*')->where('customer_id',$id)->first();
    }

}