<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(){
        return view('order.index');
    }
    public function create()
    {
        return view('order.create');
    }
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'email' => 'required|email',
            'first_name' => 'required|string|max:50', 
            'last_name' => 'required|string|max:50',
            'home_address_details' => 'nullable|string|max:255',
            'street_address' => 'required|string|max:255',
            'town_city' => 'required|string|max:100',
            'user_id' => 'required|integer',
        ]);
        Order::create($data);

    }
    public function addToCart(Request $request)
    {
        dd($request);
        
    }


}
