<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Contact;
use App\Models\Article;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Product::count();
        $totalContacts = Contact::count();
        $totalArticles = Article::count();

        return view('dashboard', compact('totalProducts', 'totalContacts', 'totalArticles'));
    }
}
