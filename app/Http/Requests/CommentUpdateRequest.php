<?php

namespace App\Http\Requests;

use App\Models\comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Shankl\Factories\AuthUserFactory;

class CommentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
         $comment = comment::findOrFail($this->id);
         $AuthUser =  AuthUserFactory::getAuthUser();
         $type =  AuthUserFactory::geGuard();
         $guard = ucfirst(AuthUserFactory::geGuard()) ;
         if ($type == 'parent') {
            $type = "App\Models" .'\\'.$guard . "t";
         
            
        }elseif ($type == 'web') {
            $type = 'App\Models\User';
        }else{
            $type = "App\Models" .'\\'. $guard;
        }
        return Gate::forUser($AuthUser)->allows('update-comment' , [$comment , $type]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "id" =>'required|exists:comments,id',
            'comment' => 'required|string',
        ];
    }
}
