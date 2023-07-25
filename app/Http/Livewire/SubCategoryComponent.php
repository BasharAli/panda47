<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;

class SubCategoryComponent extends Component
{
    public function render(Request $request)
    {
        $slug = $request->route('slug');
        $category = Category::where('slug' , $slug)->first();

        return view('livewire.sub-category-component', ['category' => $category])->layout('layouts.base');
    }
}
