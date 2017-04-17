<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 11/30/16
 * Time: 1:49 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CappingRequest extends FormRequest
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

        switch ($this->method()) {
            case 'POST': {

                return [

                    'type' => 'required|max:255',
                    'design_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'price' => 'required|numeric',
                    'metal_quantity_used' => 'string',
                    'status' => 'required|boolean',
                    'description' => 'required|string',

                ];

            }

            case 'PUT': {
                return [
                    'design_image' => 'image|required|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
            }

            default:
                break;
        }
    }


}