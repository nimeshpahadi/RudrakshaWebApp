<?php
/**
 * Created by PhpStorm.
 * User: prakash
 * Date: 11/30/16
 * Time: 1:49 AM
 */

namespace App\Http\Requests;


use App\Rudraksha\Entities\ProductInfo;
use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ];












    }

}