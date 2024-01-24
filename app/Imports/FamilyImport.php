<?php

namespace App\Imports;

use App\Models\Gpc\Family;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class FamilyImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
           'family_code' => 'required|unique:families'
       ])->validate();

        return new Family([
            'family_code'     => $row['family_code'],
            'family_title'    => $row['family_title'],
            'family_definition'    => $row['family_definition'],
        ]);
    }

    public function rules(): array
        {
            return [
            'family_code' => Rule::unique('families', 'family_code') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'family_code.unique' => 'Family Code is Duplicate'
        ];
    }
}
