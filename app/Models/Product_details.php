<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'qty',
        'color',
        'size',
        'description',
    ];
    public function product()
    {
        $this->hasOne(Product::class);
    }
}
