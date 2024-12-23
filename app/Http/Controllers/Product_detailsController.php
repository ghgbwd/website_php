<?php

namespace App\Http\Controllers;
use App\Models\Product_details;

use Illuminate\Http\Request;

class Product_detailsController extends Controller
{
    public function index()
    {
        $products_details = Product_details::all();
        return view('product_details.index', ['products_details' => $products_details]);
    }
    public function create()
    {
        return view('product_details.create');
    }
    public function store(Request $request)
    {

        $data = $request->validate([
            'product_id'=>'required',
            'qty' => 'required|integer',
            'color' => 'required',
            'description' => 'nullable',
        ]);
        $newProduct_details = Product_details::create($data);
        return redirect(route('product_details.index'));
    }
    public function edit(Product_details $product_detail)
    {
        return view('product_details.edit', ['product_detail' => $product_detail]);
    }
    public function update(Product_details $product_detail, Request $request)
    {
        $data = $request->validate([
            'qty' => 'required|integer',
            'color' => 'required',
            'description' => 'nullable',
        ]);
        $product_detail->update($data);
        return redirect(route('product_details.index'))->with('success', 'Product details Update Succesffully');
    }
    public function destroy(Product_details $product_detail)
    {
        $product_detail->delete();
        return redirect(route('product_details.index'))->with('success', 'Product details deleted Succesffully');
    }
}
