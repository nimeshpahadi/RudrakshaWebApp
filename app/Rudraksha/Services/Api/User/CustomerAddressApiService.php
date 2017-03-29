<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 10:56 AM
 */

namespace App\Rudraksha\Services\Api\User;


use App\Rudraksha\Repositories\Api\User\CustomerAddressApiRepository;

class CustomerAddressApiService
{
    /**
     * @var CustomerAddressApiRepository
     */
    private $customerAddressApiRepository;

    /**
     * CustomerAddressApiService constructor.
     * @param CustomerAddressApiRepository $customerAddressApiRepository
     */
    public function __construct(CustomerAddressApiRepository $customerAddressApiRepository)
    {
        $this->customerAddressApiRepository = $customerAddressApiRepository;
    }

    /**
     * @param $customerAddress
     * @return array
     */
    public function serviceCustomerAddressCreate($customerAddress)
    {
        $details = [
            "customer_id" => $customerAddress['customer_id'],
            "country" => $customerAddress['country'],
            "state" => $customerAddress['state'],
            "street" => $customerAddress['street'],
            "contact" => $customerAddress['contact'],
            "latitude_long" => $customerAddress['latitude_long'],
        ];

        if ($this->customerAddressApiRepository->repoCustomerAddressCreate($details)) {
            $respo = [
                "status" => "true",
                "message" => "customer address created successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];
        return $respo;
    }

    /**
     * @param $id
     * @return array
     */
    public function serviceCustomerAddressShow($id)
    {
        $address = $this->customerAddressApiRepository->repoCustomerAddressShow($id);

        $data = [
            "customer_id" => $address['customer_id'],
            "country" => $address['country'],
            "state" => $address['state'],
            "street" => $address['street'],
            "contact" => $address['contact'],
            "latitude_long" => $address['latitude_long'],
        ];

        return $data;
    }
}