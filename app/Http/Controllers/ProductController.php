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
    // Validasi data input
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update data produk
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');

    // Periksa apakah ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
        $product->image = $imagePath;
    }

    // Simpan perubahan ke database
    $product->save();

    // Redirect kembali ke halaman daftar produk dengan pesan sukses
    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
}

public function destroy(Product $product)
{
    $product->delete();
    return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
}
}

