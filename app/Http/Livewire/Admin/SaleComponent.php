<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\Sale;



class SaleComponent extends Component
{
    public $timesale;
    public $product_id;
    public $status;


    public function storeSale()
    {
        $sale = new Sale();
        $sale->status = $this->status;
        $sale->sale  = $this->timesale;
        $sale->product_id = $this->product_id;
        $sale->save();
        $this->reset();

    }

    public function disableSale($sale_id)
    {
        $disable = Sale::find($sale_id);
        $disable->status = 0;
        $disable->save();

    }

    public function enableSale($sale_id)
    {
        $enable = Sale::find($sale_id);
        $enable->status = 1;
        $enable->save();

    }

    public function deleteSale($sale_id)
    {
        $delete = Sale::find($sale_id);
        
        $delete->delete();

    }


    public function render()
    {
        $products = Product::all();
        $sales = Sale::all();

        return view('livewire.admin.sale-component', ['products' => $products, 'sales' => $sales])->layout('layouts.admin');
    }
}
