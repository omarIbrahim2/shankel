<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonUpdateReq extends FormRequest
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
            'id' => 'required|exists:lessons,id',
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            'url' => 'required|url',
            'image'=> 'nullable|image|mimes:png,jpg,jpeg,webp|max:1024',
        ];
    }
}
