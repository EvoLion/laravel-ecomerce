<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')->withTimestamps();;
    }

    public function ship_method()
    {
        return $this->hasOne(ShipMethod::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}
