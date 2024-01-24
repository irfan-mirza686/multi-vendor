<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
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
            'name' => 'required',
            'company_name' => 'required',
            'email' => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'company_address' => 'required',
            'password' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Full Name is Required.',
            'company_name.required' => 'Company Name is Required.',
            'email.required' => 'Email is Required.',
            'email.regex' => 'Enter Valid Email.',
            'mobile.required' => 'Mobile Number is Required.',
            'mobile.regex' => 'Enter valid Mobile Number',
            'company_address.required' => 'Company Address is Required.',
            'password.required' => 'Password is Required.',
            'start_date.required' => 'Start Date is Required.',
            'end_date.required' => 'End Date is Required.',
            'status.required' => 'Status is Required.'
        ];
    }

}
