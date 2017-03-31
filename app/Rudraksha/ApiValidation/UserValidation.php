<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/15/17
 * Time: 12:21 PM
 */

namespace App\Rudraksha\ApiValidation;


use App\User;
use Illuminate\Support\Facades\Validator;

class UserValidation
{

    public function authorize()
    {
        return true;
    }

    public function check($request)
    {
        $detail = $this->userValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    public function userValidator($data)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'contact' => 'required|integer',
            'alternative_contact' => 'required|integer',
        ]);
    }

    public function infoValidate($request, $id)
    {
        $user = User::find($id);

        $detail = $this->infoValidator($request, $user);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    public function infoValidator($data, $user)
    {
        return Validator::make($data, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'contact' => 'required|integer',
            'alternative_contact' => 'required|integer',
        ]);
    }

    public function imageValidate($request)
    {
        $detail = $this->imageValidator($request);

        $errors = $detail->errors()->toArray();

        if (!empty($errors)) {
            $response = [
                "status" => "false",
                "message" => $errors
            ];
            return response()->json($response);
        }
    }

    public function imageValidator($data)
    {
        return Validator::make($data, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }
}