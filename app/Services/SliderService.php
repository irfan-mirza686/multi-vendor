<?php
namespace App\Services;

use App\Models\Slider;
use Auth;

class SliderService
{
    public function getIndexData()
    {
        return Slider::with('admin')->get();
    }
    /*******************************************************/
    public function store($data, $id = null)
    {
        if ($id == null) {
            $slider = new Slider;
        } else if ($id != null) {
            $slider = Slider::find($id);
        }

        if (isset($data['image']) && !empty($data['image'])) {
            $filename = uploadSlider($data['image'], filePath('sliders'), $slider->img);
            $slider->img = $filename;
        }

        $slider->title = $data['title'];
        $slider->sub_title = $data['sub_title'];
        $slider->status = $data['status'];
        $slider->admin_id = Auth::guard('admin')->user()->id;
        return $slider;
    }
}