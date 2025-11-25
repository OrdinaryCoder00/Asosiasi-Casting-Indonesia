<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Tampilkan halaman semua news
     */
    public function index()
    {
        // Ambil semua news terbaru, urut dari published_at descending
        $news = News::orderBy('published_at', 'desc')->get();

        return view('components.home.news', compact('news'));
    }

    /**
     * Tampilkan detail news berdasarkan slug
     */
    public function show($slug)
    {
        $newsItem = News::where('slug', $slug)->firstOrFail();

        return view('components.home.news-detail', [
            'newsItem' => $newsItem
        ]);
    }

    /**
     * Filter news berdasarkan kategori
     * Bisa dipanggil via AJAX misalnya
     */
    public function filter(Request $request)
    {
        $category = $request->get('category', 'regular');

        $news = News::where('category', $category)
            ->orderBy('published_at', 'desc')
            ->get();

        return response()->json([
            'news' => $news
        ]);
    }
}
