<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 4/23/17
 * Time: 4:32 PM
 */

namespace App\Rudraksha\ApiValidation;


use Illuminate\Support\Facades\Validator;

class OrderGroupValidation
{
    /**
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function orderGroupValidate($request)
    {
        $detail = $this->orderGroupValidator($request);

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
    public function orderGroupValidator($data)
    {
        return Validator::make($data, [
            'order_items_id' => 'required|string',
            'customer_id' => 'required|integer',
            'order_group' => 'required',
            'group_status' => 'required',
        ]);
    }
}