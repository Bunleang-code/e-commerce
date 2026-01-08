<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(CategoryController::class)->prefix('categories')->group(function(){
    Route::get('/','getCategories');
    Route::post('/','createCategory');
    Route::get('/{categoryId}','getCategory');
    Route::patch('/{categoryId}','updateCategory');
    Route::delete('/{categoryId}','deleteCategory');
});

Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'getProducts');
    Route::post('/', 'createProduct');
    Route::get('/{productId}', 'getProduct');
    Route::patch('/{productId}', 'updateProduct');
    Route::delete('/{productId}', 'deleteProduct');
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }

    $user = $request->user();

    $token = $user->createToken('mobile')->accessToken;

    return response()->json([
        'token' => $token,
        'user' => $user->load('roles'),
    ]);
});

Route::middleware('auth:api')->group(function () {

    Route::get('/me', function (Request $request) {
        return response()->json([
            'user' => $request->user(),
            'roles' => $request->user()->roles,
        ]);
    });

    Route::post('/categories', [CategoryController::class, 'createCategory']);
    Route::get('/categories', [CategoryController::class, 'getCategories']);
    Route::post('/products', [ProductController::class, 'createProduct']);
    Route::patch('/categories/{category}', [CategoryController::class, 'updateCategory']);
});
