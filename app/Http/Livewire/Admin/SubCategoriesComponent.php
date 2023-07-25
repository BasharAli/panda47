<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class SubCategoriesComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $category_id;
    public $subcategory_image;

    public function generateslug()
    {

        $this->slug = Str::slug($this->name);
    }

    public function storesubCategory()
    {
        $subcategory = new SubCategory();
        $subcategory->name = $this->name;
        $subcategory->slug  =$this->slug;
        $subcategory->category_id = $this->category_id;

        $imageName = Carbon::now()->timestamp. '.' . $this->subcategory_image->extension();
        $this->subcategory_image->storeAs('subcategories' , $imageName);
        $subcategory->image = $imageName;
        
        $subcategory->save();
         
    }

    public function deletesubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
    }

    public function render()
    {
        $subCategories = SubCategory::all() ;
        $category = Category::all();

        return view('livewire.admin.sub-categories-component', ['subCategories' => $subCategories, 'category' => $category])->layout('layouts.admin');
    }
}
