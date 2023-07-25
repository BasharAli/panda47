<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;

class ShopActivationPayment extends Model
{
    use HasFactory;


    public function pay()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }
}
