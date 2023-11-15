<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'price_buy', 'price_sell', 'quantity', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
