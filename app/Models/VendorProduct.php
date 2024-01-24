<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorProduct extends Model
{
    use HasFactory;
    public function product(){
        return $this->belongsTo(Product::class,'product_id')->with(['category','unit']);
    }
    public function vendor(){
        return $this->belongsTo(Vendor::class,'vendor_id')->select('id','name','business_name','username','mobile');
    }
    public function review(){
        return $this->belongsTo(ProductReview::class,'id','vendor_product_id');
    }
    public static function categories($products){
        $catIds = [];
        foreach ($products as $key => $value) {
            $catIds[] = $value['category_id'];
        }
        $categories = Category::select('id','slug','name')->whereIn('id',$catIds)->where('status','active')->get();
        return $categories;
    }
}
