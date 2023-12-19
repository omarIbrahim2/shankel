<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddvertValidationUpdateReq extends FormRequest
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
            'id' => 'required|exists:addverts,id',
            'title_en' => 'required|string|min:3|max:255',
            'title_ar' => 'required|string|min:3|max:255',
            "desc_en" => 'required|string',
            "desc_ar" => 'required|string',
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:1024',
        ];
    }
}
