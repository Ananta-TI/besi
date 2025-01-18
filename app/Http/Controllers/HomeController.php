<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\AboutUs;
use App\Models\Industry;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $about = AboutUs::all();
        $industries = Industry::all(); // Ambil semua data industries
        return view('home', compact('products', 'about', 'industries'));
    }

    public function guestIndex()
    {
        $products = Product::all();
        $about = AboutUs::all();
        $industries = Industry::all(); // Ambil semua data industries
        return view('home', compact('products', 'about', 'industries'));
    }
}
