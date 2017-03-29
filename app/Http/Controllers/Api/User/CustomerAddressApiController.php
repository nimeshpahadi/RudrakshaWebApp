<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 10:51 AM
 */

namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use App\Rudraksha\ApiValidation\CustomerAddressValidation;
use App\Rudraksha\Services\Api\User\CustomerAddressApiService;
use Illuminate\Http\Request;

class CustomerAddressApiController extends Controller
{
    /**
     * @var CustomerAddressApiService
     */
    private $customerAddressApiService;
    /**
     * @var CustomerAddressValidation
     */
    private $customerAddressValidation;

    /**
     * CustomerAddressApiController constructor.
     * @param CustomerAddressApiService $customerAddressApiService
     * @param CustomerAddressValidation $customerAddressValidation
     */
    public function __construct(CustomerAddressApiService $customerAddressApiService,
                                CustomerAddressValidation $customerAddressValidation)
    {
        $this->customerAddressApiService = $customerAddressApiService;
        $this->customerAddressValidation = $customerAddressValidation;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerAddressCreate(Request $request)
    {
        $data = $request->all();

        $t = $this->customerAddressValidation->addressValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->customerAddressApiService->serviceCustomerAddressCreate($data);

        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerAddressShow($id)
    {
        $addressDetails = $this->customerAddressApiService->serviceCustomerAddressShow($id);

        return response()->json($addressDetails);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerAddressEdit(Request $request, $id)
    {
        $data = $request->all();

        $t = $this->customerAddressValidation->addressEditValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->customerAddressApiService->serviceCustomerAddressEdit($data, $id);

        return response()->json($response);
    }
}