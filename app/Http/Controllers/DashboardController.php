<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Article;
use App\Models\Industry;
use App\Models\AboutUs;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalContacts = Contact::count();
        $totalArticles = Article::count();
        $totalIndustries = Industry::count();
        $totalAbouts = AboutUs::count();


        return view('dashboard', compact('totalProducts', 'totalContacts', 'totalArticles','totalIndustries','totalAbouts'));
    }
}
