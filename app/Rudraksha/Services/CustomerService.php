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

    public function updateImage($request, $id)
    {
        $formData = $request->all();
        $formData = array_except($formData, ['_token', 'to', 'remove']);
        $imagename = $formData['id'] . '_' . rand(0, 10000) . '.' . $formData['image']->getClientOriginalExtension();
        $destinationPath = storage_path('app/public/users');
        $formData['image']->move($destinationPath, $imagename);
        $formData['image'] = $imagename;
        return $this->customerRepository->upload_image($formData, $id);

    }

}