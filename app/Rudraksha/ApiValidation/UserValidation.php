<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/15/17
 * Time: 12:21 PM
 */

namespace App\Rudraksha\ApiValidation;


use Illuminate\Support\Facades\Validator;

class UserValidation
{
    public function check($request)
    {
        $detail = $this->userValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status"       => "false",
                "token_status" => "true",
                "message"      => $errors
            ];
            return response()->json($response);
        }
    }

    public function userValidator($data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'email'    => 'required|email|unique:users',
            'password' => 'required'
        ]);
    }
}