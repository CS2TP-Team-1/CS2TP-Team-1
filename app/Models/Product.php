<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    // One product can be in multiple baskets (Has to be a Many-to-Many relationship and as one product could be in multiple baskets the same way one basket can have multiple products)
    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class);
    }

    // One product can be in multiple orders (Has to be a many-to-many relationship as one product could be in multiple orders the same way as one order can have multiple products)

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'orders_products', 'order_id', 'product_id');
    }
}
