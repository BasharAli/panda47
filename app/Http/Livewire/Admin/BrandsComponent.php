<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class BrandsComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $image;

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);
    }

    public function storeBrand()
    {
        $brand = new Brand();
        $brand->name = $this->name;
        $brand->slug = $this->slug;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('brands' , $imageName);
        $brand->image = $imageName;

        $brand->save();
        $this->reset();
    } 



    public function deleteBrand($brand_id)
    {
        $delete = Brand::find($brand_id);
        $delete->delete();
    }


    public function render()
    {
        $brands = Brand::all() ;
        return view('livewire.admin.brands-component', ['brands' => $brands])->layout('layouts.admin');
    }
}
