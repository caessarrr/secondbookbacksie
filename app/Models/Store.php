<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'seller_id', 'store_name', 'store_details'
    ];

    // Relasi dengan model Seller
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
