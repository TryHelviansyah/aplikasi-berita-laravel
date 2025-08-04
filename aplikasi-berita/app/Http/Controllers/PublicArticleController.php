<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class PublicArticleController extends Controller
{

    public function index(Request $request)
    {

        $keyword = $request->input('keyword');

        $query = Article::latest();

        if ($keyword) {
            $query->where('title', 'LIKE', '%' . $keyword . '%');
        }

        $articles = $query->get();

        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }
}