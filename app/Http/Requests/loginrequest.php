<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if($this->submit === 'Forgot Password')
        {
            return [
                'username' => 'required|max:50',
            ];            
        }
        elseif($this->submit === 'Login')
        {
            return [
                'username' => 'required|max:50',
                'password' => 'required'
            ];
        }
        return [];
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
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
