<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoAddReq extends FormRequest
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
            'title_en' => 'required|string|max:50|min:3',
            'title_ar' => 'required|string|max:50',
             'aboutUs_en' => 'required|string',
             'aboutUs_ar' => 'required|string',
             'mission_en' => 'required|string',
             'mission_ar' =>  'required|string',
             'vision_en' => 'required|string',
             'vision_ar' =>  'required|string',
             'choose_en' => 'required|string',
             'choose_ar' =>  'required|string',
             'image' => 'required|image|mimes:png,jpg,webp,jpeg|max:2024',
        ];
    }
}
