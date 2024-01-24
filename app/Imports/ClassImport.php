<?php

namespace App\Imports;

use App\Models\Gpc\GpcClass;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class ClassImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
           'class_code' => 'required|unique:gpc_classes'
       ])->validate();

        return new GpcClass([
            'class_code'     => $row['class_code'],
            'class_title'    => $row['class_title'],
            'class_definition'    => $row['class_definition'],
        ]);
    }

    public function rules(): array
        {
            return [
            'class_code' => Rule::unique('gpc_classes', 'class_code') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'class_code.unique' => 'Class Code is Duplicate'
        ];
    }
}
