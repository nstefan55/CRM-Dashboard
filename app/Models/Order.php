<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $fillable = ['order_date', 'total_amount', 'customer_id', 'user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_product', 'order_id', 'product_id')
            ->withPivot('quantity', 'unit_price', 'order_placed_at', 'status');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
