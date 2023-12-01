<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','promotion','metalType','category','mainImage'];

    // One product can be in multiple baskets (Has to be a Many-to-Many relationship and as one product could be in multiple baskets the same way one basket can have multiple products)
    public function baskets(): BelongsToMany
    {
        return $this->belongsToMany(Basket::class, 'basket_products', 'basket_id', 'product_id');
    }

    // One product can be in multiple orders (Has to be a many-to-many relationship as one product could be in multiple orders the same way as one order can have multiple products)

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'orders_products', 'order_id', 'product_id');
    }

    // One product can have multiple images

    public function productImages() : HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
}
