<?php

namespace App\Http\Requests;

use App\Rules\StartEndTimeRule;
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
            'title_en' => 'required|string|min:3',
            'title_ar' => 'required|string|min:3',
            "desc_en" => 'required|string',
            "desc_ar" => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|afterOrEqual:start_date',
            "start_time" => 'required|regex:/(\d+\:\d+)/',
            'end_time' => ["required","regex:/(\d+\:\d+)/", new StartEndTimeRule($this->start_date , $this->end_date , $this->start_time , $this->end_time)],
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:1024|nullable',
            'area_id' => 'required|exists:areas,id',
        ];
    }
}
