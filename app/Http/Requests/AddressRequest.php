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
            'country' => 'required',
            'state' => 'required',
            'street' => 'required',
            'contact' => 'required',
            'latitude_long' => 'required',

        ];
    }
}