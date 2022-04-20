<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', ['categories' => $categories]);
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
            'color' => 'required|max:7'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();

        return redirect()->route('categories.index')->with('success', 'Nueva categoria agregada');
    }

    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', ['category' => $category]);
    }

    public function update(Request $request, $category)
    {
        $category = Category::find($category);
        $category->name = $request->name;
        $category->color = $request->color;
        $category->save();
        return redirect()->route('categories.index')->with('success', 'Categoria actualizada');
    }

    public function destroy($category)
    {
        $category = Category::find($category);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada');
    }
}
