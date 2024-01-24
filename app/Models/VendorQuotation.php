<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendorQuotation extends Model
{
    use HasFactory, SoftDeletes;

    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id')->select('id','business_name');
    }

    public function vendor_product(){
        return $this->belongsTo(VendorProduct::class,'product_id');
    }
}
