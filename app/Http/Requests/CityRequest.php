<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CityRequest extends FormRequest
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
            'state_id' => 'required',
            'name' => 'required|unique:states,name',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'state_id.required' => 'Please Select State',
            'name.required' => 'Please Enter City Name',
            'status.required' => 'Please Select Status'
        ];
    }

    public function failedValidation(Validator $validator)
    {
       throw new HttpResponseException(response()->json([
         'status'   => 400,
         'errors'      => $validator->errors()
     ]));
   }
}
