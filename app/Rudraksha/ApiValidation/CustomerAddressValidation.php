<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/29/17
 * Time: 11:07 AM
 */

namespace App\Rudraksha\ApiValidation;


use Illuminate\Support\Facades\Validator;

class CustomerAddressValidation
{
    public function addressValidate($request)
    {
        $detail = $this->addressValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    public function addressValidator($data)
    {
        return Validator::make($data, [
            'customer_id' => 'required|integer',
            'country' => 'required',
            'state' => 'required',
            'street' => 'required',
            'contact' => 'required|integer',
            'latitude_long' => 'required|integer',
        ]);
    }
}