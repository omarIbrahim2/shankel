<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddChildRequest extends FormRequest
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
            'age' => 'required|numeric|min:3|max:20',
            'gender'=> 'required|string|in:male,female',
            'grade_id' => 'required|exists:grades,id',
            'image' => 'image|mimes:jpg,png,jpeg,webp|nullable',
            'birth_date' => 'required',
            'parentt_id' => 'required|exists:parentts,id',

        ];
    }
}
