<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventValidationUpdateReq extends FormRequest
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
            'id' => 'required|exists:events,id',
            'title' => 'required|string|min:5',
            "desc" => 'required|string',
            'start_at' => 'required|date|after:now',
            'end_at' => 'required|date|after-or-equal:start_at',
            'image' => 'image|mimes:jpeg,jpg,png|max:1024|nullable',
            'area_id' => 'required|exists:areas,id',
        ];
    }
}