<?php
namespace Shankl\Repositories;

use App\Models\Slider;

class SliderRepo{

    public function getSliders($pages=null){

        if ($pages != null) {
            return Slider::select("id" , 'image' , 'title' , 'info')->paginate($pages);
        }
        return Slider::select("id" , 'image' , 'title' , 'info')->get();
    }

    public function createSlider($data){

        return Slider::create($data);
    }

    public function getSlider($sliderId)
    {
        return Slider::findOrFail($sliderId);
    }

    public function updateSlider($sliderId , $data)
    {
        $slider =$this->getSlider($sliderId);
        return $slider->update($data);
    }

    public function deleteSlider($sliderId)
    {
        $slider =$this->getSlider($sliderId);
        return $slider->delete();
    }
}