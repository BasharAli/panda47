<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\About;
use Carbon\Carbon;
use Livewire\WithFileUploads;



class AboutComponent extends Component
{
    use WithFileUploads;


    public $image;
    public $title;
    public $description;

    public $limited;



    public function addAbout()
    {
        $about = new About();
        $about->title = $this->title;
        $about->description = $this->description;


        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('about' , $imageName);
        $about->image = $imageName;

        $about->save();

        $this->reset();
    }



    public function deleteAbout($about_id)
    {
        $about = About::find($about_id);
        $about->delete();

    }

    public function isLimited()
    {
        if (About::all()->count() == 1) {
            $this->limited  = 1;
        } else {
            $this->limited = 0;
        }

    }


    public function render()
    {
        $this->isLimited();
        
        $abouts = About::all()->take(1);

        return view('livewire.admin.about-component', ['abouts' => $abouts])->layout('layouts.admin');
    }
}
