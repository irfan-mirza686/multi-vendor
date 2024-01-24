<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class SliderRequest extends FormRequest
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
        if ($this->id) {
            return [
                'title' => ['required', Rule::unique('sliders')->ignore($this->id)],
                'sub_title' => ['required', Rule::unique('sliders')->ignore($this->id)],
                'status' => 'required'
            ];
        }else{
            return [
                'title' => ['required', Rule::unique('sliders')->ignore($this->id)],
                'sub_title' => ['required', Rule::unique('sliders')->ignore($this->id)],
                'image' => 'required',
                // 'image' => 'required|dimensions:width=1920,height=600',
                'status' => 'required'
            ];
        }

    }

    public function messages()
    {
        return [
            'title.required' => 'Title is Required',
            'title.unique' => 'Title must be unique',
            'sub_title.required' => 'Sub Title is Required',
            'sub_title.unique' => 'Sub Title must be unique',
            'image.required' => 'Slider Image is Required',
            'image.dimensions' => 'Image Size required (1920px - 600px)',
            'status.required' => 'Please Select Status'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 400,
            'errors' => $validator->errors()
        ]));
    }
}
