<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category = Category::create($validated);

        return redirect("/category")->with('success', 'Category added succesfully');
    }

    public function getAll()
    {
        $categories = Category::all();

        return view('category.list', ['categories' => $categories]);
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $category->update($validated);

        return redirect("/category")->with('success', 'Category updated succesfully');
    }

    public function deleteBindedModel(Category $category)
    {
        $category->delete();

        return redirect("/category")->with('success', 'Category deleted succesfully');
    }
}
