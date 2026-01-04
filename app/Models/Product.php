<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock_count',
        'reserved_stock',
        'is_active'
    ];

    public function orderItems(): BelongsToMany
    {
        return $this->belongsToMany(
            OrderItem::class,
            'order_items'
        );
    }

    public function cartItem(): BelongsToMany
    {
        return $this->belongsToMany(
            CartItem::class,
            'cart_items'
        );
    }
}
