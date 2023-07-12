<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class areaupdateRequest extends FormRequest
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
            'id' => 'required|exists:cities,id',
            'name_en' => 'required|string|max:50|min:3',
            'name_ar' => 'required|string|max:50',
        ];
    }
}
