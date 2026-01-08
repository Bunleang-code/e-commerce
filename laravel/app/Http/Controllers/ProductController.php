<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller{
    // GET /api/products
    public function getProducts(){
        // eager load category
        $products = Product::with('category')->get();

        return response()->json($products);
    }

    // POST /api/products
    public function createProduct(Request $request){

        abort_unless(auth()->user()->can('products.create'), 403); // Check permission

        $request->validate([
            'name'        => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'pricing'     => 'required|numeric',
            'description' => 'nullable|string',
            'images'      => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('products', 'public');
        }

        $product = Product::create([
            'name'        => $request->name,
            'category_id' => $request->category_id,
            'pricing'     => $request->pricing,
            'description' => $request->description,
            'images'      => $imagePath ? [$imagePath] : null,
        ]);

        return response()->json($product, 201);
    }

    // GET /api/products/{productId}
    public function getProduct($productId){

        $product = Product::with('category')->findOrFail($productId);

        return response()->json($product);
    }

    // PATCH /api/products/{productId}
    public function updateProduct(Request $request, $productId){

        abort_unless(auth()->user()->can('products.update'), 403); // Check permission

        $product = Product::findOrFail($productId);

        $request->validate([
            'name'        => 'sometimes|string|max:255',
            'category_id' => 'sometimes|exists:categories,id',
            'pricing'     => 'sometimes|numeric',
            'description' => 'sometimes|nullable|string',
            'images'      => 'sometimes|nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('images')) {
            $imagePath = $request->file('images')->store('products', 'public');
            $product->images = [$imagePath];
            $product->save();
        }

        $product->update($request->only([
            'name',
            'category_id',
            'pricing',
            'description',
        ]));

        return response()->json($product);
    }


    // DELETE /api/products/{productId}
    public function deleteProduct($productId){

        abort_unless(auth()->user()->can('products.delete'), 403); // Check permission

        $product = Product::findOrFail($productId);
        $product->delete();

        return response()->json(['message' => 'Product deleted']);
    }
}
