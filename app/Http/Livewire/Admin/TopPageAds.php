<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\TwinAds;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class TopPageAds extends Component
{
    use WithFileUploads;


    public $image;
    public $ad_name;
    public $title;
    public $short_desc;
    public $link;

    public $limited;

    public function addTwinAd()
    {
        $twin_ad = new TwinAds();
        $twin_ad->ad_name = $this->ad_name;
        $twin_ad->title = $this->title;
        $twin_ad->short_desc  = $this->short_desc;
        $twin_ad->link  = $this->link;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('ads' , $imageName);
        $twin_ad->image = $imageName;

        $twin_ad->save();

        $this->reset();
         
    }

    public function deleteSlider($ad_id)
    {
        $slider = TwinAds::find($ad_id);
        $slider->delete();
    }

    public function isLimited()
    {
        if (TwinAds::all()->count() == 2) {
            $this->limited  = 1;
        } else {
            $this->limited = 0;
        }

    }

    public function render()
    {
        $this->isLimited();
        $twinads = TwinAds::all();
        return view('livewire.admin.top-page-ads', ['twinads' => $twinads])->layout('layouts.admin');
    }
}
