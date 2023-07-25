<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSettings extends Model
{
    use HasFactory;
    protected $table = "shop_settings";


    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'pref_delivery_id', 'id');
    }


}
