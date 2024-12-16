<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    // Tidak perlu menggunakan __construct untuk middleware di sini

    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Article::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('articles.index');
    }

    public function edit(Article $article)
    {
        if ($article->user_id != auth()->id()) {
            abort(403);
        }
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        if ($article->user_id != auth()->id()) {
            abort(403);
        }

        $article->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('articles.index');
    }

    public function destroy(Article $article)
    {
        if ($article->user_id != auth()->id()) {
            abort(403);
        }

        $article->delete();
        return redirect()->route('articles.index');
    }
}


