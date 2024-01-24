<?php

namespace App\Imports;

use App\Models\Gpc\Attribute;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class AttributeImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
           'attribute_code' => 'required|unique:attributes'
       ])->validate();
        // echo "<pre>"; print_r($row); exit();
        return new Attribute([
            'attribute_code'     => $row['attribute_code'],
            'attribute_title'    => $row['attribute_title'],
            'attribute_definition'    => $row['attribute_definition'],
        ]);
    }

    public function rules(): array
        {
            return [
            'attribute_code' => Rule::unique('attributes', 'attribute_code') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'attribute_code.unique' => 'Attribute Code is Duplicate'
        ];
    }
}
