<?php
/**
 * Created by PhpStorm.
 * User: nimesh
 * Date: 3/24/17
 * Time: 1:19 PM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'country' => 'required|string',
            'state' => 'required|string',
            'street' => 'required|string',
            'contact' => 'required|numeric|min:5',
            'latitude_long' => 'required',

        ];
    }
}