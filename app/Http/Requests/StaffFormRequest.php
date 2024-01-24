<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffFormRequest extends FormRequest
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
            'image' => 'required',
            'email' => 'required|email|unique:admins,email',
            'name' => 'required',
            'group_id' => 'required',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'image.required' => 'Profile Image is Required',
            'name.unique' => 'Name is Required.',
            'email.required' => 'Email is Required.',
            'group_id.required' => 'Role is Required.',
            'status.required' => 'Status is Required.'
        ];
    }
}
