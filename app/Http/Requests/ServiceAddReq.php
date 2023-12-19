<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Shankl\Factories\AuthUserFactory;
use Illuminate\Foundation\Http\FormRequest;

class ServiceAddReq extends FormRequest
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
            'name_en' => 'required|string|min:3|max:50',
            'name_ar' => 'required|string|min:3|max:50',
            "supplier_id" => 'required|exists:suppliers,id',
            'quantity' => 'required|numeric|integer|min:1',
            "price" => "required|numeric|min:1",
            "desc_en" => "required|string",
            "desc_ar" => "required|string",
            'image' => "image|mimes:jpeg,jpg,png,webp|max:2024|nullable",
        ];
    }
}
