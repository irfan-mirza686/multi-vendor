<?php

namespace App\Imports;

use App\Models\Gpc\AttributeValue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class AttributeValueImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
           'attribute_value_code' => 'required|unique:attribute_values'
       ])->validate();
// echo "<pre>"; print_r($row); exit();
        return new AttributeValue([
            'attribute_value_code'     => $row['attribute_value_code'],
            'attribute_value_title'    => $row['attribute_value_title'],
            'attribute_value_definition'    => $row['attribute_value_definition'],
        ]);
    }

    public function rules(): array
        {
            return [
            'attribute_value_code' => Rule::unique('attribute_values', 'attribute_value_code') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'attribute_value_code.unique' => 'Attribute Value Code is Duplicate'
        ];
    }
}
