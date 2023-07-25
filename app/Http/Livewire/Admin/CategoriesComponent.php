<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;


class CategoriesComponent extends Component
{
    use WithFileUploads;


    public $name;
    public $slug;
    public $category_image;

    public function generateslug()
    {

        $this->slug = Str::slug($this->name);
    }

    public function storeCategory()
    {
        $category = new Category();
        $category->name = $this->name;
        $category->slug  =$this->slug;

        $imageName = Carbon::now()->timestamp. '.' . $this->category_image->extension();
        $this->category_image->storeAs('categories' , $imageName);
        $category->image = $imageName;
        
        $category->save();
        $this->reset();
         
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function render()
    {

        $categories = Category::all() ;
        return view('livewire.admin.categories-component', ['categories' => $categories])->layout('layouts.admin');
    }
}
