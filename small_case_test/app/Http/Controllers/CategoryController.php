<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.list',compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categories.edit',compact('category'));
    }

    public function update(Request $request,$id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->save();
        return redirect()->route('category.index');
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index');
    }
}
