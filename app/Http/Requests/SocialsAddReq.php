<?php

namespace App\Http\Requests;

use App\Rules\PhoneValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SocialsAddReq extends FormRequest
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
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'Linkedin' => 'nullable|url',
            'email' => 'email',
            'phone' => new PhoneValidationRule(),
            'address_en' => 'string',
            'address_ar' => 'string',
        ];
    }
}
