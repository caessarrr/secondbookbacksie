<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id', 'total_amount', 'status',
    ];

    // Relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi dengan model OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
