<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'meta_title', 'meta_decription', 'meta_keywords', 'status', 'image', 'parent_category', 'is_featured'];

    // public function setNameAttribute($value)
    // {
    //     $this->attributes['slug'] = Str::slug($value);
    //     $this->attributes['name'] = $value;
    // }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_category')->where('status', 'active');
    }

    public function parentcategory()
    {
        return $this->belongsTo(Category::class, 'parent_category')->select('id', 'name');
    }

    public static function catDetails($slug)
    {
        $catDetails = Category::select('id', 'parent_category', 'name', 'slug')->with([
            'subcategories' => function ($query) {
                $query->select('id', 'parent_category', 'name', 'slug')->where('status', 'active');
            }
        ])->where('slug', $slug)->first()->toArray();

        if ($catDetails['parent_category'] == 0) {
            // Only Show Main Category in Breadcrumb
            $breadcrumb = '<a href="' . url($catDetails['slug']) . '">' . $catDetails['name'] . '</a>';
        } else {
            // Show Main and Subcategory in Breadcrumb
            $parentCategory = Category::select('name', 'slug')->where('id', $catDetails['parent_category'])->first()->toArray();
            $breadcrumb = '<a href="' . url($parentCategory['slug']) . '">' . $parentCategory['name'] . '</a>&nbsp;<span class="divider">/</span>&nbsp;<a href="' . url($catDetails['slug']) . '">' . $catDetails['name'] . '</a>';
        }
        $catIds = array();
        $catIds[] = $catDetails['id'];
        $subCategories = [];
        foreach ($catDetails['subcategories'] as $key => $subcat) {
            $catIds[] = $subcat['id'];
            $subCategories[] = array(
                'slug' => $subcat['slug'],
                'name' => $subcat['name']
            );
        }
        //   echo "<pre>"; print_r($subCategories); exit;
        return array('catIds' => $catIds, 'catDetails' => $catDetails, 'breadcrumb' => $breadcrumb, 'subCategories' => $subCategories);
    }
}
