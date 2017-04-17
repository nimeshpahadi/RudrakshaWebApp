<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 11/30/16
 * Time: 1:49 AM
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                    'name' => 'required|unique:categories|max:255|min:5',
                    'code' => 'required|unique:categories',
                    'short_description' => 'required|max:500',
                    'information' => 'required',
                    'status' => 'required|boolean',
                    'face_no' => 'required|numeric',

                ];

            }

            case 'PUT': {
                return [
                    'name' => 'required|max:255|min:5|unique:categories,name,' . $this->get('id'),
                    'code' => 'required|unique:categories,code,' . $this->get('id'),
                    'short_description' => 'required|max:500',
                    'information' => 'required',
                    'status' => 'required|boolean',
                    'face_no' => 'required|numeric',

                ];
            }

            default:
                break;
        }
    }


}