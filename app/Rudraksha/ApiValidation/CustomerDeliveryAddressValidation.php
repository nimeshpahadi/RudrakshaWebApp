<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 12:42 PM
 */

namespace App\Rudraksha\ApiValidation;


use Illuminate\Support\Facades\Validator;

class CustomerDeliveryAddressValidation
{
    public function deliveryAddressValidate($request)
    {
        $detail = $this->deliveryAddressValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    public function deliveryAddressValidator($data)
    {
        return Validator::make($data, [
            'customer_id' => 'required|integer',
            'country' => 'required',
            'state' => 'required',
            'street' => 'required',
            'contact' => 'required|integer',
            'latitude_long' => 'required|integer',
            'city' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'zip_code' => 'required|integer',
        ]);
    }

    public function deliveryAddressEditValidate($request)
    {
        $detail = $this->deliveryAddressEditValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    public function deliveryAddressEditValidator($data)
    {
        return Validator::make($data, [
            'country' => 'required',
            'state' => 'required',
            'latitude_long' => 'required|integer',
            'city' => 'required',
            'address_line1' => 'required',
            'address_line2' => 'required',
            'zip_code' => 'required|integer',
        ]);
    }
}