<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', ['categories' => $categories]);
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
        return redirect(route('category.index'));
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
        return redirect(route('category.index'))->with('success', 'Category Update Succesffully');
    }
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('success', 'Category deleted Succesffully');
    }
}
