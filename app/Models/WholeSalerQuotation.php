<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WholeSalerQuotation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['wholesaler_id','product_id','vendor_id','description','start_date','end_date','status'];
    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id')->select('id','name','business_name');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id')->with('category');
    }
    public function wholesaler(){
        return $this->belongsTo(WholeSaler::class,'wholesaler_id')->select('id','name','business_name');
    }
}
