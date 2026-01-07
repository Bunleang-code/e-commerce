<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // GET /api/categories
    public function getCategories()
    {
        $this->authorize('viewAny', Category::class);

        return response()->json(Category::all());
    }

    // POST /api/categories
    public function createCategory(Request $request)
    {
        $this->authorize('create', Category::class);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'created_by' => auth()->id(), // important for policy
        ]);

        return response()->json($category, 201);
    }

    // GET /api/categories/{category}
    public function getCategory(Category $category)
    {
        $this->authorize('view', $category);

        return response()->json($category);
    }

    // PATCH /api/categories/{category}
    public function updateCategory(Request $request, Category $category)
    {
        $this->authorize('update', $category);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return response()->json($category);
    }

    // DELETE /api/categories/{category}
    public function deleteCategory(Category $category)
    {
        $this->authorize('delete', $category);

        $category->delete();

        return response()->json(['message' => 'Category deleted']);
    }
}
