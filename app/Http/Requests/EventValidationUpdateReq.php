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
            'title' => 'required|string|min:5|max:255',
            "desc" => 'required|string',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            "start_time" => 'required|regex:/(\d+\:\d+)/',
            'end_time' => ["required","regex:/(\d+\:\d+)/", new StartEndTimeRule($this->start_date , $this->end_date , $this->start_time , $this->end_time)],  
            'image' => 'image|mimes:jpeg,jpg,png,webp|max:1024|nullable',
            'area_id' => 'required|exists:areas,id',
        ];
    }
}
