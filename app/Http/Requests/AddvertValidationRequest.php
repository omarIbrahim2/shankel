<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddvertValidationRequest extends FormRequest
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
            'title_en' => 'required|string|min:5|max:255',
            'title_ar' => 'required|string|min:5|max:255',
            "desc_en" => 'required|string',
            "desc_ar" => 'required|string',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:1024',
        ];
    }
}
