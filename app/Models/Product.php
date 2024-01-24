<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'name',
    'slug',
    'brand',
    'sku',
    'category_id',
    'country_id',
    'state_id',
    'city_id',
    'unit_id',
    'image',
    'other_images',
    'quantity',
    'item_price',
    'discount',
    'description',
    'wholesaler_id',
    'status'
  ];

  protected $casts = [
    'other_images' => 'array',
    'seo_data' => 'array'
  ];

  public static function getDiscount($product_id)
  {
    $product = Product::select('id', 'item_price', 'discount')->find($product_id);
    $discountedPrice = 0;
    if ($product->discount > 0) {
      $totalDiscount = ($product->item_price * $product->discount) / 100;
      $discountedPrice = $product->item_price - $totalDiscount;
    }
    return $discountedPrice;
  }

  public function admins()
  {

    return $this->belongsTo('App\Models\Admin', 'admin_id');
  }

  public function wholesalers()
  {

    return $this->belongsTo('App\Models\WholeSaler', 'wholesaler_id');
  }

  public function category()
  {

    return $this->belongsTo(Category::class, 'category_id');
  }
  public function unit()
  {

    return $this->belongsTo('App\Models\Unit', 'unit_id');
  }

}
