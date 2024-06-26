<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Seller extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'profile_photo'
    ];

    protected $hidden = [
        'password',
    ];

    // Accessor to hash password when setting it
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    // Relasi dengan model Product
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // Relasi dengan model Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
