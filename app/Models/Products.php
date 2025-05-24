<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'image',
        'quantity',
        'price',
        'sale_price',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    protected $casts = [
        'price' => 'float',
        'sale_price' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
