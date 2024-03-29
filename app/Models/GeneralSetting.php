<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;

    protected $guarded =[];

    protected $casts = [
        'smtp_config' => 'object',
        'seo_description' => 'array'
    ];
}
