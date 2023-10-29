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
}
