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
            'facebook' => 'string|url',
            'twitter' => 'string|url',
            'instagram' => 'string|url',
            'Linkedin' => 'string|url',
            'email' => 'email',
            'phone' => new PhoneValidationRule(),
            'address' => 'string',
        ];
    }
}
