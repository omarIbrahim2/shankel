<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventValidationRequest extends FormRequest
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
            'title' => 'required|string|min:5|max:255',
            "desc" => 'required|string',
            'start' => 'required|date|after:today',
            "start_at" => 'required|date_format:H:i',
            'end_at' => 'required|date_format:H:i|after:start_at',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:1024',
            'area_id' => 'required|exists:areas,id',
        ];
    }
}
