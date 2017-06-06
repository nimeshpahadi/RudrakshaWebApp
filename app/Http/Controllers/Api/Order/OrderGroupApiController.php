<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/23/17
 * Time: 4:30 PM
 */

namespace App\Http\Controllers\Api\Order;


use App\Http\Controllers\Controller;
use App\Rudraksha\ApiValidation\OrderGroupValidation;
use App\Rudraksha\Services\Api\Order\OrderGroupApiService;
use Illuminate\Http\Request;

class OrderGroupApiController extends Controller
{
    /**
     * @var OrderGroupValidation
     */
    private $orderGroupValidation;
    /**
     * @var OrderGroupApiService
     */
    private $orderGroupApiService;

    /**
     * OrderGroupApiController constructor.
     * @param OrderGroupValidation $orderGroupValidation
     * @param OrderGroupApiService $orderGroupApiService
     */
    public function __construct(OrderGroupValidation $orderGroupValidation, OrderGroupApiService $orderGroupApiService)
    {
        $this->orderGroupValidation = $orderGroupValidation;
        $this->orderGroupApiService = $orderGroupApiService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $t = $this->orderGroupValidation->orderGroupValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->orderGroupApiService->create($data);

        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerOrderHistory($id)
    {
        $response = $this->orderGroupApiService->customerOrderHistory($id);
        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function customerOrderHistoryDetails($id) {
        $response = $this->orderGroupApiService->customerOrderHistoryDetails($id);
        return response()->json($response);
    }
}