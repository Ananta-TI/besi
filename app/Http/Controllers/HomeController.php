<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\About;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Method untuk user authenticated
    public function index()
    {
        $products = Product::all(); // Retrieve all products
        return view('home', compact('products')); // Pass the products to the home view
    }

    // Method untuk guest
    public function guestIndex()
    {
        $products = Product::all(); // Retrieve all products for guests
        return view('home', compact('products')); // Pass the products to the same home view
    }

}
