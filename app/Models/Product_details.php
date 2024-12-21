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
    ];
    public function product()
    {
        $this->hasOne(Product::class);
    }
}
