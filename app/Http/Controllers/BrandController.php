<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function search()
    {
        $name = '';
        if (isset($_GET['name'])) {
            $name = $_GET['name'];
        }
        $brands = Brand::where('name', 'LIKE', '%' . $name . '%')->get();
        return view('brands.index', ['brands' => $brands]);
    }
    public function index()
    {
        $brands = Brand::all();
        return view('brands.index', ['brands' => $brands]);
    }
    public function create()
    {
        return view('brands.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $newBrand = Brand::create($data);
        return redirect(route('brand.index'));
    }
    public function edit(Brand $brand)
    {
        return view('brands.edit', ['brand' => $brand]);
    }
    public function update(Brand $brand, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $brand->update($data);
        return redirect(route('brand.index'))->with('success', 'Brand Update Succesffully');
    }
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect(route('brand.index'))->with('success', 'Brand deleted Succesffully');
    }
}