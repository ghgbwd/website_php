<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'phone',
        'first_name',
        'last_name',
        'home_address_details',
        'street_address',
        'town_city',
        'email',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order_detail(){
        return $this->hasMany(Order_detail::class,'order_id');
    }
}
