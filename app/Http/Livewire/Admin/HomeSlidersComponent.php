<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;



class HomeSlidersComponent extends Component
{
    use WithFileUploads;


    public $image;
    public $title;
    public $subtitle;
    public $short_desc;
    public $link;


    

    public function addSlider()
    {
        $slider = new HomeSlider();
        $slider->title = $this->title;
        $slider->subtitle  = $this->subtitle;
        $slider->short_desc  = $this->short_desc;
        $slider->link  = $this->link;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('sliders' , $imageName);
        $slider->image = $imageName;

        $slider->save();
         
    }

    public function deleteSlider($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $slider->delete();
    }

    public function render()
    {

        $sliders = HomeSlider::all();

        return view('livewire.admin.home-sliders-component', ['sliders' => $sliders])->layout('layouts.admin');
    }
}
