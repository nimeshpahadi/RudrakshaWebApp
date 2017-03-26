<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 11:54 AM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CustomerAddressRepository;

class CustomerAddressService
{

    /**
     * @var CustomerAddressRepository
     */
    private $addressRepository;

    /**
     * CustomerAddressService constructor.
     * @param CustomerAddressRepository $addressRepository
     */
    public function __construct(CustomerAddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    /**
     * @param $request
     * @return bool
     */
    public function serviceAddressStore($request)
    {
        $storeAddress = $this->addressRepository->repoAddressStore($request);

        return $storeAddress;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomerAddress($id)
    {
        return $this->addressRepository->repoCustomerAddress($id);
    }

    /**
     * @param $request
     * @param $id
     * @return bool
     */
    public function serviceAddressUpdate($request, $id)
    {
        return $this->addressRepository->repoAddressUpdate($request, $id);

    }

    /**
     * @param $id
     * @return mixed
     */
    public function getCustomerAddressCid($id)
    {
        return $this->addressRepository->getCustomerAddress($id);
    }

}