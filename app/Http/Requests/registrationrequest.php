<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class registrationrequest extends FormRequest
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
        return [
            'first' => 'required|string|max:20|regex:/^[A-Za-z\s]+$/',
            'last' => 'required|string|max:20|regex:/^[A-Za-z\s]+$/',
            'email_id' => 'required|email|unique:logins,email_id',
            'mobile' => 'required|integer|digits:10|unique:logins,mobile',
            'gender' => 'required',
            // 'dob' => 'required|date|before:2006-01-01', // specific date 
            'dob' => 'required|date|before:'.now()->subYears(18)->format('Y-m-d'), // validation of current date to 18 years 
            // 'password' => 'required|string|min:8|regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&]).+$/',// PHP preg_match() 
            'password' => ['required','string',Password:: min(8)->mixedCase()->numbers()->symbols()],
            'cn_password' => 'required|string|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            // custom messages 
        ];
    }

    public function attributes(): array
    {
        return [
            // Give the filed name in error
            'first' =>'First Name',
            'last' => 'Last Name' ,
            'email_id' => 'Email Id' ,
            'mobile' => 'Mobile Number' ,
            'gender' => 'Gender' ,
            'dob' => 'Date of Birth' ,
            'Password' => 'Password' ,
            'cn_password' => 'Confirm Password' ,
        ];
    }
}