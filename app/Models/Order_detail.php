<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'total',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function orders(){
        return $this->belongsTo(Order::class);
    }
}
