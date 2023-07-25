<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KargoCompanies;

class KargoPrices extends Model
{
    use HasFactory;
    protected $table = "kargo_prices";

    public function company()
    {
        return $this->belongsTo(KargoCompanies::class, 'company_id', 'id');
    }
}
