<?php

namespace App\Http\Requests;

use App\Rules\PhoneValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ParentRegisterReq extends FormRequest
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
            'email' => 'required|email|unique:parentts,email',
            'phone' => ['required' , new PhoneValidationRule()],
            'gender'=> 'required|string|in:male,female',
            'area_id' => 'required|exists:areas,id',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048|',
            'password' => 'required|confirmed|min:6',
        ];
    }

    
}
