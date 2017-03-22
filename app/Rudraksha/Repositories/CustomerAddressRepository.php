<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 11:56 AM
 */

namespace App\Rudraksha\Repositories;


use App\Rudraksha\Entities\CustomerAddress;
use Illuminate\Contracts\Logging\Log;

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

    public function __construct(CustomerAddress $customerAddress, Log $log)
    {
        $this->customerAddress = $customerAddress;
        $this->log = $log;
    }

}