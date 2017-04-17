<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 11/30/16
 * Time: 1:49 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class DeliveryAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'customer_id' => 'required|numeric',
            'country' => 'required|string',
            'contact' => 'required|string|min:5',
            'city' => 'required|string',
            'state' => 'required|string',
            'latitude_long' => 'required|string',
            'address_line1' => 'required|string',
            'address_line2' => 'required|string',
            'zip_code' => 'required|numeric',
        ];












    }

}