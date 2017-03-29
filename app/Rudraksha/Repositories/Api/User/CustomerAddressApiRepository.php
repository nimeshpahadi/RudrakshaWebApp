<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 11:01 AM
 */

namespace App\Rudraksha\Repositories\Api\User;


use App\Rudraksha\Entities\CustomerAddress;

class CustomerAddressApiRepository
{
    /**
     * @var CustomerAddress
     */
    private $customerAddress;

    /**
     * CustomerAddressApiRepository constructor.
     * @param CustomerAddress $customerAddress
     */
    public function __construct(CustomerAddress $customerAddress)
    {
        $this->customerAddress = $customerAddress;
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
                            ->where('id', $id)
                            ->first();
    }
}