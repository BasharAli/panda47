<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;



class Order extends Model
{
    use HasFactory;
    protected $table = "orders";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shipping()
    {
        return $this->hasOne(Shipping::class);
    }

    public function transactionss()
    {
        return $this->hasOne(Transaction::class);
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }
    
    
}
