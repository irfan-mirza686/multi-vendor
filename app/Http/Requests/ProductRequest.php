<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name'  => 'required',Rule::unique('products')->ignore($this->id),
            'sku' => 'required',
            'item_price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'unit_id' => 'required',
            'status' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Product Name is Required.',
            'name.unique' => 'Product Name Must Be Unique.',
            'sku.required' => 'SKU is Required.',
            'item_price.required' => 'Price is Required.',
            'image.required' => 'Product Thumbnail is Required.',
            'category_id.required' => 'Category is Required.',
            'unit_id.required' => 'Unit is Required.',
            'status.required' => 'Status is Required.',
        ];
    }
}
