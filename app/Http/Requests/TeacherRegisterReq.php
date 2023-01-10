<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRegisterReq extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required',
            'area_id' => 'required|exists:areas,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048|',
            'password' => 'required|confirmed|min:6',
            'cv' => 'file|mims:pdf|max:2048',
            'field' => 'required|string|min:4|max:50'
        ];
    }
}
