<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;



class UpdateCategoryComponent extends Component
{
    use WithFileUploads;

    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $category_image;
    public $newCategory_image;




    public function mount($category_slug)
    {

        $this->category_slug =  $category_slug;
        $category = Category::where('slug' , $category_slug)->first();
        $this->category_id = $category->id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->category_image = $category->image;
        
    }

    public function generateslug()
    {
        $this->slug = Str::slug($this->name);

    }

    public function updateCategory()
    {

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;

        if ($this->newCategory_image) {
            $imageName = Carbon::now()->timestamp. '.' . $this->newCategory_image->extension();
            $this->newCategory_image->storeAs('categories' , $imageName);
            $category->image = $imageName;
        }

        $category->save();
        return redirect()->route('cat.add');

    }

    
    public function render()
    {
        return view('livewire.admin.update-category-component')->layout('layouts.admin');
    }
}
