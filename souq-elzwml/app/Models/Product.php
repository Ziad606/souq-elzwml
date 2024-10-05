<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'summary',
        'price',
        'category_id',
    ];
    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function productImage():HasMany
    {
        return $this->hasMany(ProductImage::class);
    }
    public function getFirstImageAttribute()
    {
        return $this->productImage()->first();
    }
    use HasFactory;
}
