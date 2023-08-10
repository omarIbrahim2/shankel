<?php

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierUpdateReq extends FormRequest
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
            'id' => 'required|exists:suppliers,id',
            'name_en' => "required|string|max:255",
            'name_ar' => "required|string|max:255",
            'email' => ['required','email' ,Rule::unique("suppliers")->ignore($this->id) ],
            "image" => 'image|mimes:png,jpeg,jpg,webp|max:2024|nullable',
            'type_en' => 'required|string|max:255',
            'type_ar' => 'required|string|max:255',
            'orgName_en' => 'required|string|max:255',
            'orgName_ar' => 'required|string|max:255',
            'area_id' => "required|exists:areas,id",
        ];
    }
}
