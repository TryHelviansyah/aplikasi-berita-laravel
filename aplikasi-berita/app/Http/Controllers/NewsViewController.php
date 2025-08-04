<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewsViewController extends Controller
{
    public function index(Request $request)
    {
        $apiKey = env('NEWS_API_KEY');
        $articles = [];
        $errorMessage = null;
        $keyword = $request->input('keyword');
        $pageTitle = 'Berita Terkini';

        try {
            if ($keyword) {
                $pageTitle = 'Hasil Pencarian untuk: ' . $keyword;
                $endpoint = "https://newsapi.org/v2/everything?q={$keyword}&searchIn=title&apiKey={$apiKey}";
            } else {

                $endpoint = "https://newsapi.org/v2/everything?q=indonesia&apiKey={$apiKey}";
            }

            $response = Http::get($endpoint);

            if ($response->successful()) {
                $articles = $response->json()['articles'];
            } else {
                $errorMessage = "Gagal mengambil data dari sumber berita.";
            }

        } catch (\Exception $e) {
            $errorMessage = "Tidak dapat terhubung ke server berita saat ini. Silakan coba lagi nanti.";
        }

        return view('news.index', [
            'articles' => $articles,
            'error' => $errorMessage,
            'pageTitle' => $pageTitle,
        ]);
    }
}