<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/21/17
 * Time: 1:50 PM
 */

namespace App\Http\Controllers\Api\Order;


use App\Http\Controllers\Controller;
use App\Rudraksha\ApiValidation\OrderValidation;
use App\Rudraksha\Services\Api\Order\OrderApiService;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    /**
     * @var OrderApiService
     */
    private $orderApiService;
    /**
     * @var OrderValidation
     */
    private $orderValidation;

    /**
     * OrderApiController constructor.
     * @param OrderApiService $orderApiService
     * @param OrderValidation $orderValidation
     */
    public function __construct(OrderApiService $orderApiService, OrderValidation $orderValidation)
    {
        $this->orderApiService = $orderApiService;
        $this->orderValidation = $orderValidation;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $t = $this->orderValidation->orderValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->orderApiService->create($data);
        return response()->json($response);
    }

    /**
     * @return array
     */
    public function show($id)
    {
        return $this->orderApiService->show($id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit(Request $request, $id)
    {
        $data = $request->all();

        $t = $this->orderValidation->orderEditValidate($data);

        if ($t!=null) {
            return $t;
        }

        $response = $this->orderApiService->edit($data, $id);
        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $response = $this->orderApiService->destroy($id);
        return response()->json($response);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAll($id)
    {
        $response = $this->orderApiService->deleteAll($id);
        return response()->json($response);
    }
}