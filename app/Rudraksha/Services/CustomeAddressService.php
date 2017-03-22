<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 11:54 AM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CustomerAddressRepository;

class CustomeAddressService
{

    /**
     * @var CustomerAddressRepository
     */
    private $addressRepository;

    public function __construct(CustomerAddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }
}