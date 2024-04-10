<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductVariant extends Model
{
    use HasFactory;
    protected $table = "product_variants";

    public function productVariantItems(): HasMany
    {
        return $this->hasMany(ProductVariantItem::class);
    }
}
