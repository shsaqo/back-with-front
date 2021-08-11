<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'status' => 'integer',
            'color' => 'string|max:50',
            'name' => 'required|string|max:250',
            'description' => 'string|max:250|nullable',
            'description_color' => 'string|max:50|nullable',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000',
            'sale' => 'required|integer',
            'old_price' => 'between:0,99.99',
            'price' => 'required||between:0,99.99',
            'count' => 'required|integer',
            'sale_time_one_status' => 'integer',
            'sale_time_two_status' => 'integer',
            'info_short_description_important_text' => 'string|nullable',
            'youtube_link' => 'string|nullable',
            'how_to_order_type' => 'integer',
            'last_name' => 'string|max:250|nullable',
            'last_photo' => 'mimes:jpeg,png,jpg,gif,svg|max:10000',
            'phone_type' => 'integer',
            'url' => 'string|unique:products',

            'info_short_description' => 'string|nullable',
            'info_short_description_photo' => 'string|nullable',
            'info_short_description_type' => 'integer',
            'info_short_description_text' => 'array|nullable',

            'info_long_description' => 'string|nullable',
            'info_long_description_photo' => 'string|nullable',
            'info_long_description_type' => 'integer',
            'info_long_description_text' => 'array|nullable',

            'slider_photo' => 'string|max:250',

            'user_photo' => 'string|max:250',
            'user_name' => 'array',
            'comment_text' => 'array',
            'comment_video' => 'array',
            'comment_type' => 'array',
            'like' => 'array'




        ];
    }
}
