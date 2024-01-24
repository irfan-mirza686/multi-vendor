<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WholesalerRegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|unique:whole_salers,username|min:6',
            'first_name' => 'required',
            'last_name' => 'required',
            'mobile' => 'required|unique:whole_salers,mobile|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => 'required|email|unique:whole_salers,email',
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
            'terms' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Username is required',
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'mobile.required' => 'Mobile Number is Required.',
            'mobile.regex' => 'Enter valid Mobile Number',
            'email.required' => 'Email is required',
            'terms.required' => 'Accept Terms & Conditions',
        ];
    }
}
