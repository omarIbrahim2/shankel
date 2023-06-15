<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;

class CardAddReq extends FormRequest
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
        $service = Service::select('quantity')->findOrFail($this->service_id);
        return [
            "service_id" => 'required|exists:services,id',
            'quantity' => "required|min:1|max:$service->quantity",
        ];
    }
}
