<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsCategoriesController extends Controller
{
    public function getCreateCategoryView()
    {
        return view('create_category');
    }

    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:news_categories'
        ]);

        $category = new NewsCategory();
        $category->name = $validated['name'];
        $category->save();

        return redirect()->route('create.category.view')->with('success', 'Category created successfully');
    }
}
