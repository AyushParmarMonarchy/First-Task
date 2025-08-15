<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class forgotrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // if(auth()->check())
        // {
        //     return true ;
        // }
        // else
        // {
        //     return false ;
        // }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'old_password'=>'required|string',
            'new_password'=>['required','string',Password:: min(8)->mixedCase()->numbers()->symbols()],
            'cn_password'=> 'required|string|same:new_password',
        ];
    }
    
    public function messages(): array
    {
        return [
            // custom error message
            // 'usernamer.required' => 'name is required',
        ];
    }

    public function attributes(): array
    {
        return [
            'old_password' =>'Old Password',
            'new_Password' =>'New Password',
            'cn_password'  =>'Confirm Password',
        ];
    }
}
