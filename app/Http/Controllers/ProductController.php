<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // Retrieve all products from the database
        return view('products.index', compact('products')); // Pass the products to the view
    }

    // Menampilkan form tambah produk
    public function create()
{
    return view('products.create'); // Return the view for creating a product
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle file upload and save product
    $imageName = time() . '.' . $request->image->extension();
    $request->image->move(public_path('images/products'), $imageName);

    Product::create([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imageName,
    ]);

    return redirect()->route('products.index')->with('success', 'Product created successfully.');
}

public function edit(Product $product)
{
    return view('products.edit', compact('product')); // Return the view for editing a product
}

public function update(Request $request, Product $product)
{
    // Similar validation and update logic
}

public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}
}

