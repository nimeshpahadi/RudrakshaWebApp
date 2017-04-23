<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/21/17
 * Time: 1:58 PM
 */

namespace App\Rudraksha\ApiValidation;


use Illuminate\Support\Facades\Validator;

class OrderValidation
{
    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderValidate($request)
    {
        $detail = $this->orderValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function orderValidator($data)
    {
        return Validator::make($data, [
            'product_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'capping_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'quantity' => 'required',
            'order_status' => 'required',
        ]);
    }

    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderEditValidate($request)
    {
        $detail = $this->orderValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    /**
     * @param $data
     * @return mixed
     */
    public function orderEditValidator($data)
    {
        return Validator::make($data, [
            'product_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'capping_id' => 'required|integer',
            'currency_id' => 'required|integer',
            'quantity' => 'required',
            'order_status' => 'required',
        ]);
    }
}