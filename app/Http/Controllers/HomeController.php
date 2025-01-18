<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\AboutUs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk user authenticated
    public function index()
    {
        $products = Product::all(); // Mengambil semua produk
        $about = AboutUs::all(); // Mengambil satu data About (jika hanya ada satu data)
        return view('home', compact('products', 'about'));
    }

    public function guestIndex()
    {
        $products = Product::all(); // Mengambil semua produk
        $about = AboutUs::all(); // Mengambil satu data About
        return view('home', compact('products', 'about'));
    }


}
