<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 2:07 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CustomerRepository;

class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
 {

     $this->customerRepository = $customerRepository;
 }

    public function getCustomer()
    {
        return $this->customerRepository->getAllCustomer();
    }

    public function getCustomerId($id)
    {
    return $this->customerRepository->getCustomerId($id);
    }

}