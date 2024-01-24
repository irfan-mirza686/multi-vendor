<?php

namespace App\Imports;

use App\Models\Gpc\Segment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class SegmentImport implements ToModel, WithValidation, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Validator::make($row, [
           'segment_code' => 'required|unique:segments'
       ])->validate();

        return new Segment([
           'segment_code'     => $row['segment_code'],
            'segment_title'    => $row['segment_title'],
            'segment_definition'    => $row['segment_definition'],
        ]);
    }

    public function rules(): array
        {
            return [
            'segment_code' => Rule::unique('segments', 'segment_code') // Table name, field in your db
        ];
    }

    public function customValidationMessages()
    {
        return [
            'segment_code.unique' => 'Segment Code is Duplicate'
        ];
    }
}
