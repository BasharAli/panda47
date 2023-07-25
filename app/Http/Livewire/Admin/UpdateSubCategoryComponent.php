<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use App\Models\SubCategory;


class UpdateSubCategoryComponent extends Component
{
    use WithFileUploads;
    
    public $subcategory_slug;
    public $subcategory_id;
    public $category_id;
    public $name;
    public $slug;
    public $subcategory_image;
    public $newsubCategory_image;


    public function mount($subcategory_slug)
    {
        $this->subcategory_slug =  $subcategory_slug;
        $subcategory = SubCategory::where('slug' , $subcategory_slug)->first();
        $this->subcategory_id = $subcategory->id;
        $this->category_id = $subcategory->category_id;
        $this->name = $subcategory->name;
        $this->slug = $subcategory->slug;
        $this->subcategory_image = $subcategory->image;



    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);

    }

    public function updatesubCategory()
    {

        $subcategory = SubCategory::find($this->subcategory_id);
        $subcategory->name = $this->name;
        $subcategory->slug = $this->slug;
        $subcategory->category_id = $this->category_id;


        if ($this->newsubCategory_image) {
            $imageName = Carbon::now()->timestamp. '.' . $this->newsubCategory_image->extension();
            $this->newsubCategory_image->storeAs('subcategories' , $imageName);
            $subcategory->image = $imageName;
        }

        $subcategory->save();
        return redirect()->route('sub.add');

    }




    public function render()
    {
        $category = Category::all();

        return view('livewire.admin.update-sub-category-component', ['category' => $category])->layout('layouts.admin');
    }
}
