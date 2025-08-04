<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $my_articles = Article::latest()->get();
        return view('my_articles.index', ['articles' => $my_articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('my_articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|url'
        ]);

        Article::create($validatedData);

        return redirect()->route('articles.index')->with('success', 'Artikel berhasil dipublikasikan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $my_article) // DIGANTI: $article -> $my_article
    {
        // Kirim dengan nama variabel 'article' agar view tidak perlu diubah
        return view('my_articles.edit', ['article' => $my_article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $my_article) // DIGANTI: $article -> $my_article
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'summary' => 'required',
            'content' => 'required',
            'image_url' => 'nullable|url' // DITAMBAHKAN: validasi untuk image_url
        ]);

        $my_article->update($validatedData); // DIGANTI: $article -> $my_article

        return redirect()->route('my-articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $my_article) // DIGANTI: string $id -> Article $my_article
    {
        $my_article->delete(); // DIGANTI: $article -> $my_article

        // DIUBAH: agar kembali ke halaman index dengan pesan sukses
        return redirect()->route('my-articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}