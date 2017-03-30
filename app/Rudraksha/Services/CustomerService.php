<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 3/22/17
 * Time: 2:07 PM
 */

namespace App\Rudraksha\Services;


use App\Rudraksha\Repositories\CustomerAddressRepository;
use App\Rudraksha\Repositories\CustomerRepository;

class CustomerService
{
    /**
     * @var CustomerRepository
     */
    private $customerRepository;
    /**
     * @var CustomerAddressRepository
     */
    private $customerAddressRepository;

    public function __construct(CustomerRepository $customerRepository, CustomerAddressRepository $customerAddressRepository)
 {

     $this->customerRepository = $customerRepository;
     $this->customerAddressRepository = $customerAddressRepository;
 }

    public function getCustomer()
    {
        return $this->customerRepository->getAllCustomer();
    }

    public function getCustomerId($id)
    {
        return $this->customerRepository->getCustomerId($id);
    }

    public function updateImage($request, $id)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $imagename = $formData['id'] . '_' . rand(0, 10000) . '.' . $formData['image']->getClientOriginalExtension();
        $destinationPath = storage_path('app/public/image/users');
        $formData['image']->move($destinationPath, $imagename);
        $formData['image'] = $imagename;
        return $this->customerRepository->upload_image($formData, $id);

    }

    public function changePassword( $request,$id)
    {
        $data = $this->customerRepository->ChangePassword($request,$id);
        return $data;
    }
}