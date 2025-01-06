<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function search()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $name = request()->get('search', '');
        $sort = request()->get('sort');
        $price = request()->get('price', 5000000); // Giá mặc định là 5 triệu
        $brand = request()->get('brand');
        $category = request()->get('category');

        $query = Product::where('name', 'LIKE', '%' . $name . '%')
            ->where('status', 1)
            ->where('price', '<=', $price);

        // Lọc theo thương hiệu nếu có
        if (!empty($brand)) {
            $query->where('brand_id', $brand);
        }

        // Lọc theo danh mục nếu có
        if (!empty($category)) {
            $query->where('category_id', $category);
        }

        // Sắp xếp (nếu cần)
        if (!empty($sort)) {
            $query->orderBy('id', $sort); // VD: $sort = 'asc' hoặc 'desc'
        }

        // Phân trang
        $products = $query->simplePaginate(8)
            ->appends([
                'search' => $name,
                'sort' => $sort,
                'price' => $price,
                'brand' => $brand,
                'category' => $category,
            ]);
        return view('products.index', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }
    public function index()
    {
        $products = Product::where('status', 1)->simplePaginate(8);
        $brands = Brand::all();
        $categories = Category::all();
        return view('products.index', ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }
    public function home_review()
    {
        $products = Product::where('status','1')->simplePaginate(8);
        if(session('email')){
            $email = session('email');
            if($email === 'admin@gmail.com'){
                return redirect()->route('admin.index');
            }
        }
        
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
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        return redirect(route('admin.index', ['tab' => 'product']))->with('success', 'Sản phẩm đã được thêm thành công!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'qty' => 'nullable|numeric|min:0',
            'price' => 'nullable|regex:/^\d+(\.\d{1,2})?$/',
            'size' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'brand_id'=>'nullable|integer',
            'category_id' => 'nullable|integer',
        ]);

        $data = [];

        // Xử lý dữ liệu (chỉ thêm trường không null)
        foreach ($validatedData as $key => $value) {
            if ($value !== null && !in_array($key, ['image', 'image2', 'image3', 'image4'])) {
                $data[$key] = $value;
            }
        }

        // Xử lý các file ảnh
        $imageFields = ['image', 'image2', 'image3', 'image4'];
        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Lưu file ảnh mới
                $data[$field] = $request->file($field)->store('products', 'public');
            }
        }

        // Chỉ cập nhật nếu có thay đổi dữ liệu
        if (!empty($data)) {
            $product->update($data);
        }

        // Redirect về danh sách sản phẩm với thông báo thành công
        return redirect(route('admin.index',['tab'=>'product']))->with('success', 'Sản phẩm đã được cập nhật thành công.');
    }


    public function destroy(Product $product)
    {
        $product->status = 0;
        $product->save();
        return redirect(route('admin.index'))->with('success', 'Product deleted Succesffully');
    }
    public function detail(Product $product){
        $relatedProducts = Product::where('id', '!=', $product->id) // Loại trừ sản phẩm hiện tại
            ->limit(5)  // Giới hạn số lượng sản phẩm liên quan
            ->get()->sortByDesc('id');
        return view('products.detail', compact('product', 'relatedProducts'));
    }
}
