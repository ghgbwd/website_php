<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.index', ['categories' => $categories]);
    }
    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $newcategory = Category::create($data);
        return redirect()->back();
    }
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }
    public function update(Category $category, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        $category->update($data);
        return redirect()->route('admin.index', ['tab' => 'category']);
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.index', ['tab' => 'category']);
    }
}
