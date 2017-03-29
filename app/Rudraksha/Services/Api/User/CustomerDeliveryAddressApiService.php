<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 12:34 PM
 */

namespace App\Rudraksha\Services\Api\User;


use App\Rudraksha\Repositories\Api\User\CustomerDeliveryAddressApiRepository;

class CustomerDeliveryAddressApiService
{
    /**
     * @var CustomerDeliveryAddressApiRepository
     */
    private $deliveryAddressApiRepository;

    /**
     * CustomerDeliveryAddressApiService constructor.
     * @param CustomerDeliveryAddressApiRepository $deliveryAddressApiRepository
     */
    public function __construct(CustomerDeliveryAddressApiRepository $deliveryAddressApiRepository)
    {
        $this->deliveryAddressApiRepository = $deliveryAddressApiRepository;
    }

    /**
     * @param $deliveryAddress
     * @return array
     */
    public function serviceCustomerDeliveryAddressCreate($deliveryAddress)
    {
        $details = [
            "customer_id" => $deliveryAddress['customer_id'],
            "country" => $deliveryAddress['country'],
            "state" => $deliveryAddress['state'],
            "street" => $deliveryAddress['street'],
            "contact" => $deliveryAddress['contact'],
            "latitude_long" => $deliveryAddress['latitude_long'],
            "city" => $deliveryAddress['city'],
            "address_line1" => $deliveryAddress['address_line1'],
            "address_line2" => $deliveryAddress['address_line2'],
            "zip_code" => $deliveryAddress['zip_code'],
        ];

        if ($this->deliveryAddressApiRepository->repoCustomerDeliveryAddressCreate($details)) {
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
    public function serviceCustomerDeliveryAddressShow($id)
    {
        $deliveryAddress = $this->deliveryAddressApiRepository->repoCustomerDeliveryAddressShow($id);

        $data = [
            "customer_id" => $deliveryAddress['customer_id'],
            "country" => $deliveryAddress['country'],
            "state" => $deliveryAddress['state'],
            "latitude_long" => $deliveryAddress['latitude_long'],
            "city" => $deliveryAddress['city'],
            "address_line1" => $deliveryAddress['address_line1'],
            "address_line2" => $deliveryAddress['address_line2'],
            "zip_code" => $deliveryAddress['zip_code'],
        ];

        return $data;
    }

    /**
     * @param $request
     * @param $id
     * @return array
     */
    public function serviceCustomerDeliveryAddressEdit($request, $id)
    {
        if ($this->deliveryAddressApiRepository->repoCustomerDeliveryAddressEdit($request, $id)) {
            $respo = [
                "status" => "true",
                "message" => "customer delivery address updated successfully !!!"
            ];
            return $respo;
        }

        $respo = [
            "status" => "false",
            "message" => "oops !!! something went wrong"
        ];

        return $respo;
    }
}