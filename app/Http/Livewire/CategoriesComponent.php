<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class CategoriesComponent extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.categories-component', ['categories' => $categories])->layout('layouts.base');
    }
}
