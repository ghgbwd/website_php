<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'qty',
        'color',
        'description',
        'product_id',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
