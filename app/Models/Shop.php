<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

use App\Models\Types;

class Shop extends Model
{
    use HasFactory;
    protected $table="shops";

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function companyType()
    {
        return $this->hasOne(Types::class);
    }

    public function setting()
    {
        return $this->hasOne(ShopSettings::class);
    }

    public function delivery()
    {
        return $this->hasOne(KargoCompanies::class, 'id', 'delivery_company');
    }

    public function deliveryPrice()
    {
        return $this->hasOne(KargoPrices::class, 'id', 'delivery_option');
    }

    public function payments()
    {
        return $this->hasMany(ShopActivationPayment::class, 'shop_id', 'id');
    }
}
