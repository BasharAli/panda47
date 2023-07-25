<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Sale;


class Product extends Model
{
    use HasFactory;

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id' , 'id');
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'id', 'product_id');
    }



    


}
