<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{

    protected $fillable = ['name', 'price', 'promotion', 'metalType', 'category', 'mainImage', 'description', 'stock'];

    // One product can be in multiple orders (Has to be a many-to-many relationship as one product could be in multiple orders the same way as one order can have multiple products)

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class, 'orders_products', 'product_id', 'order_id');
    }

    //A product can have many reviews
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function returns() :HasMany
    {
        return $this->hasMany(ReturnOrder::class);
    }

}
