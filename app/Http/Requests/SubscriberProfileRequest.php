<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberProfileRequest extends FormRequest
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
            'company_name' => 'required',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'company_address' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Company Name is Required.',
            'mobile.required' => 'Mobile Number is Required.',
            'mobile.regex' => 'Enter valid Mobile Number',
            'company_address.required' => 'Company Address is Required.',
            'start_date.required' => 'Start Date is Required.',
            'end_date.required' => 'End Date is Required.'
        ];
    }
}
