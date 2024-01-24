<?php
namespace App\Services;

use App\Models\{
	Category,
};
use Str;

class CategoryService
{
    public function all()
	{
		return Category::get();
	}
	/************************************************/
	public function store($data,$id=null)
	{
        if ($id==null) {
            $create = new Category;
        }else{
            $create = Category::find($id);
        }

        if (isset($data['image']) && !empty($data['image'])) {
            $filename = uploadImage($data['image'], filePath('categories'), $create->image);
            $create->image = $filename;
        }

		$create->name = $data['name'];
        $create->slug = $data['slug'] ?? Str::slug($data['name']);
        $create->meta_title = $data['meta_title'];
        $create->meta_decription = $data['meta_decription'];
        $create->meta_keywords = $data['meta_keywords'];
        $create->status = $data['status'];
        $create->parent_category = $data['parent_category'];
        return $create;
	}
	/************************************************/
	public function find($id)
	{
		return Category::where('id',$id)->first();
	}
	/************************************************/
	public function update($data,$id)
	{
		$updateData = $this->find($id);
		$updateData->name = $data['name'];
		$updateData->save();
	}
	/************************************************/
	public function delete($id)
	{
		$this->find($id)->delete();
	}
	/************************************************/
}
