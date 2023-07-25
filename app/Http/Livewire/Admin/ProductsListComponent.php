<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;

class ProductsListComponent extends Component
{
    public function render()
    {
        $products = Product::all() ;
        return view('livewire.admin.products-list-component', ['products' => $products])->layout('layouts.admin');
    }
}
