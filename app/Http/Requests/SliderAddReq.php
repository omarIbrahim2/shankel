<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddReq extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title_en" => 'required|string|max:50',
            "title_ar" => 'required|string|max:50',
            "info_en" => 'required|string',
            "info_ar" => 'required|string',
            'image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2048',
        ];
    }
}
