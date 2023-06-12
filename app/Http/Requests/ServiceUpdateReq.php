<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceUpdateReq extends FormRequest
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
            'id' => 'required|exists:services,id',
            "name" => "required|string|max:255",
            "supplier_id" => 'exists:suppliers,id',
            'quantity' => 'required|numeric|integer|min:1',
            "price" => "required|numeric|min:1",
            "desc" => "required|string",
            'image' => "image|mimes:jpeg,jpg,png,webp|max:1024|nullable",
        ];
    }
}
