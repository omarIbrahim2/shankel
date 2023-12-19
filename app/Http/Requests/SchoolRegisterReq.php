<?php

namespace App\Http\Requests;

use App\Rules\PhoneValidationRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use League\Config\Exception\ValidationException;

class SchoolRegisterReq extends FormRequest
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
            'email' => 'required|email|unique:schools,email',
            'phone' => ['required' , new PhoneValidationRule()],
            'area_id' => 'required|exists:areas,id',
            'image' => 'image|mimes:jpg,png,jpeg,webp|max:2048',
            'password' => 'required|confirmed|min:6',
            'grade_id' => 'required|exists:grades,id',
             "type" => 'required|in:Center,School,KG',
             "free_seats" => 'required|numeric|min:0',
             "edu_systems_id" => 'required|exists:edu_systems,id',
             "establish_date" => 'required|date|before:today',
        
        ];
    }




 

  
}
