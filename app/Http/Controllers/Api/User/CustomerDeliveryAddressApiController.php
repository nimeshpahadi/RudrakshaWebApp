<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 12:32 PM
 */

namespace App\Http\Controllers\Api\User;


use App\Http\Controllers\Controller;
use App\Rudraksha\ApiValidation\CustomerDeliveryAddressValidation;
use App\Rudraksha\Services\Api\User\CustomerDeliveryAddressApiService;
use Illuminate\Http\Request;

class CustomerDeliveryAddressApiController extends Controller
{
    /**
     * @var CustomerDeliveryAddressApiService
     */
    private $deliveryAddressApiService;
    /**
     * @var CustomerDeliveryAddressValidation
     */
    private $deliveryAddressValidation;

    /**
     * CustomerDeliveryAddressController constructor.
     * @param CustomerDeliveryAddressApiService $deliveryAddressApiService
     * @param CustomerDeliveryAddressValidation $deliveryAddressValidation
     */
    public function __construct(CustomerDeliveryAddressApiService $deliveryAddressApiService, CustomerDeliveryAddressValidation $deliveryAddressValidation)
    {
        $this->deliveryAddressApiService = $deliveryAddressApiService;
        $this->deliveryAddressValidation = $deliveryAddressValidation;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerDeliveryAddressCreate(Request $request)
    {
        $data = $request->all();

        $t = $this->deliveryAddressValidation->deliveryAddressValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->deliveryAddressApiService->serviceCustomerDeliveryAddressCreate($data);

        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerDeliveryAddressShow($id)
    {
        $addressDetails = $this->deliveryAddressApiService->serviceCustomerDeliveryAddressShow($id);

        return response()->json($addressDetails);
    }
}