<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Basket extends Model
{
    use HasFactory;

    // Find the user that owns the basket

    public function user(): BelongsTo 
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // One basket can have multiple products (Has to be a Many-to-Many relationship and as one product could be in multiple baskets the same way one basket can have multiple products)
    public function products(): BelongsToMany 
    {
        return $this->belongsToMany(Product::class, 'basket_products', 'product_id', 'basket_id');
    }
}
