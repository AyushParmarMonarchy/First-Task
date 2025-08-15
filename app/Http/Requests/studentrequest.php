<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class studentrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if(auth()->check())
        {
            return true ;
        }
        else
        {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // image file, max 2MB
            'name'        => 'required|string|max:255',
            'gender'      => 'required', // only these values allowed
            'std'         => 'required|integer|min:1|max:12', // class standard 1-12
            'class'       => 'required|string|max:10',
            'activity'    => 'required|array|min:1',
            'activity.*'  => 'string|max:50',
            'mobile'      => 'required|digits:10|numeric|unique:students,mobile',
            'email_id'    => 'required|email|max:255|unique:students,email_id',
            'dob' => 'required | date | before:'.now()->subYears(5)->format('Y-m-d'),
        ];
    }

    public function attributes(): array
    {
        return [
            'photo' =>'Photo',
            'name' => 'Name',
            'gender' => 'Gender',
            'std' => 'Standard',
            'class' => 'Class',
            'activity' => 'Activity',
            'mobile' => 'Mobile',
            'email_id' => 'Email Id',
            'dob' => 'Date of Birth',
        ];
    }
}
