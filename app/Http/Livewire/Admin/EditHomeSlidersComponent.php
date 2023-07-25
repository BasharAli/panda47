<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class EditHomeSlidersComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $title;
    public $subtitle;
    public $short_desc;
    public $link;
    public $newimage;
    public $slider_id;

    public function mount($slider_id)
    {
        $slider = HomeSlider::find($slider_id);
        $this->image = $slider->image;
        $this->title = $slider->title;
        $this->subtitle = $slider->subtitle;
        $this->short_desc = $slider->short_desc;
        $this->link = $slider->link;
        $this->slider_id = $slider->id;
    }

    public function updateSlider()
    {
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->title;
        $slider->subtitle  = $this->subtitle;
        $slider->short_desc  = $this->short_desc;
        $slider->link  = $this->link;

        if ($this->newimage) {
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('sliders' , $imageName);
            $slider->image = $imageName;
        }
        
        $slider->save();
        return redirect()->route('slider.add');

    }


    public function render()
    {
        return view('livewire.admin.edit-home-sliders-component')->layout('layouts.admin');
    }
}
