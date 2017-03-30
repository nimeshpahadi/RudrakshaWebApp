<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/24/17
 * Time: 1:19 PM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password' => 'required|min:6|confirmed',
        ];
    }
}