<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\SingleAd;

use Carbon\Carbon;
use Livewire\WithFileUploads;

class SingleAdComponent extends Component
{

    use WithFileUploads;


    public $name;
    public $title;
    public $short_desc_1;
    public $short_desc_2;
    public $img1;
    public $img2;
    public $link;

    public $limited;

    public function addSingleAd()
    {
        $singleAd = new SingleAd();
        $singleAd->name = $this->name;
        $singleAd->title = $this->title;
        $singleAd->short_desc_1  = $this->short_desc_1;
        $singleAd->short_desc_2  = $this->short_desc_2;
        $singleAd->link  = $this->link;

        $imageName = Carbon::now()->timestamp. '.' . $this->img1->extension();
        $this->img1->storeAs('ads' , $imageName);
        $singleAd->img1 = $imageName;

        $image2Name = Carbon::now()->timestamp. '.' . $this->img2->extension();
        $this->img2->storeAs('ads' , $image2Name);
        $singleAd->img2 = $image2Name;

        $singleAd->save();

        $this->reset();
         
    }

    public function deleteSingleAd($ad_id)
    {
        $singleAd = SingleAd::find($ad_id);
        $singleAd->delete();
    }

    public function isLimited()
    {
        if (SingleAd::all()->count() == 1) {
            $this->limited  = 1;
        } else {
            $this->limited = 0;
        }

    }

    public function render()
    {
        $this->isLimited();

        $singlead = SingleAd::all();

        return view('livewire.admin.single-ad-component', ['singlead' => $singlead])->layout('layouts.admin');
    }
}
