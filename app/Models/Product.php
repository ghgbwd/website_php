<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'brand_id',
        'image',
        'image2',
        'image3',
        'image4',
        'size',
        'qty',
        'price',
        'description',
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function product_detail()
    {
        return $this->hasMany(Product_details::class);
    }
    public function order_detail(){
        return $this->hasMany(Order_detail::class, 'product_id');
    }
}
