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
        $x=explode(',',$request['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $request['latitude_long']= $t;
        $request = array_except($request, ['_token', 'to', 'remove']);

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
        $x=explode(',',$request['latitude_long']);
        $t['latitude']=$x[0];
        $t['longitude']=trim($x[1]);
        $request['latitude_long']= $t;
        $request = array_except($request, ['_token', 'to', 'remove']);
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