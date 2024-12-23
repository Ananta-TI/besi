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
        'image' => 'required|file|max:20480',
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
        'name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'nullable|file|image|max:20480', // Gambar tidak wajib saat update
    ]);

    // Update data produk
    $product->name = $request->input('name');
    $product->description = $request->input('description');
    $product->price = $request->input('price');
    $product->stock = $request->input('stock');

    // Periksa apakah ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image) {
            $oldImagePath = public_path('images/products/' . $product->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Menghapus gambar lama
            }
        }
        
        // Upload gambar baru
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images/products'), $imageName);
        $product->image = $imageName; // Menyimpan nama file gambar baru
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

public function show(Product $product)
{
    return view('products.show', compact('product'));
}

}

