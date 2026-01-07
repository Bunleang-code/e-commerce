<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET /api/categories
    public function getCategories()
    {
        // returns Illuminate\Database\Eloquent\Collection
        $categories = Category::all();

        return response()->json($categories);
    }

    // POST /api/categories
    public function createCategory(Request $request)
    {

        abort_unless(auth()->user()->can('categories.create'), 403); // Check permission

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
        ]);

        return response()->json($category, 201);
    }

    // GET /api/categories/{categoryId}
    public function getCategory($categoryId)
    {
        $category = Category::findOrFail($categoryId);

        return response()->json($category);
    }

    // PATCH /api/categories/{categoryId}
    public function updateCategory(Request $request, $categoryId)
    {
        abort_unless(auth()->user()->can('categories.update'), 403); // Check permission

        $category = Category::findOrFail($categoryId);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return response()->json($category);
    }

    // DELETE /api/categories/{categoryId}
    public function deleteCategory($categoryId)
    {
        abort_unless(auth()->user()->can('categories.delete'), 403); // Check permission

        $category = Category::findOrFail($categoryId);
        $category->delete();

        return response()->json(['message' => 'Category deleted']);
    }
}
