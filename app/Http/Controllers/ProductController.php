<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function search()
    {
        $name = '';
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        }
        $products = Product::where('name', 'LIKE', '%' . $name . '%')->get();
        return view('products.index', ['products' => $products]);
    }
    public function index()
    {
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }
    public function home_review()
    {
        $products = Product::all();
        return view('welcome', ['products' => $products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        // Validate dữ liệu đầu vào
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
        ]);


        $imagePath = null;
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('products', 'public');
        }
        $image2Path = null;
        if ($request->hasFile('image2')) {

            $image2Path = $request->file('image2')->store('products', 'public');
        }
        $image3Path = null;
        if ($request->hasFile('image3')) {

            $image3Path = $request->file('image3')->store('products', 'public');
        }
        $image4Path = null;
        if ($request->hasFile('image4')) {

            $image4Path = $request->file('image4')->store('products', 'public');
        }

 
        $data['image'] = $imagePath;
        $data['image2'] = $image2Path;
        $data['image3'] = $image3Path;
        $data['image4'] = $image4Path;
        Product::create($data);

        return redirect(route('product.index'))->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'size' => 'string',
            'description' => 'nullable'
        ]);
        $imagePath = null;
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('products', 'public');
        }
        $image2Path = null;
        if ($request->hasFile('image2')) {

            $image2Path = $request->file('image2')->store('products', 'public');
        }
        $image3Path = null;
        if ($request->hasFile('image3')) {

            $image3Path = $request->file('image3')->store('products', 'public');
        }
        $image4Path = null;
        if ($request->hasFile('image4')) {

            $image4Path = $request->file('image4')->store('products', 'public');
        }


        $data['image'] = $imagePath;
        $data['image2'] = $image2Path;
        $data['image3'] = $image3Path;
        $data['image4'] = $image4Path;
        $product->update($data);
        return redirect(route('product.index'))->with('success', 'Product Update Succesffully');
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Succesffully');
    }
    public function detail(Product $product){
        $relatedProducts = Product::where('id', '!=', $product->id)  // Loại trừ sản phẩm hiện tại
            ->limit(5)  // Giới hạn số lượng sản phẩm liên quan
            ->get()->sortByDesc('id');
        return view('products.detail', compact('product', 'relatedProducts'));
    }
}
