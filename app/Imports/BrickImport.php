<?php

namespace App\Imports;

use App\Models\Gpc\Brick;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class BrickImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
           'brick_code' => 'required|unique:bricks'
       ])->validate();

        return new Brick([
            'brick_code'     => $row['brick_code'],
            'brick_title'    => $row['brick_title'],
            'brick_definition_includes'    => $row['brick_definition_includes'],
            'brick_definition_excludes'    => $row['brick_definition_excludes'],
        ]);
      
    }

    public function rules(): array
        {
            return [
            'brick_code' => Rule::unique('bricks', 'brick_code') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'brick_code.unique' => 'Brick Code is Duplicate'
        ];
    }
}
