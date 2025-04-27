<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        // $latestArticle = Article::latest()->first(); // Artikel terbaru sebagai pilihan utama
        $latestArticle = Article::whereHas('category', function ($query) {
            $query->where('name', 'project');
        })->latest()->first(); // Artikel terbaru dengan kategori 'project'
        $articles = Article::where('id', '!=', optional($latestArticle)->id)
            ->whereDoesntHave('category', function ($query) {
                $query->where('name', 'project');
            })
            ->orderBy('id', 'desc')->paginate(6);
        $articlesProject = Article::where('id', '!=', optional($latestArticle)->id)
            ->whereHas('category', function ($query) {
                $query->where('name', 'project');
            })
            ->orderBy('id', 'desc')
            ->paginate(2);
        $popularArticles = Article::where('created_at', '>=', now()->subDays(7))
            ->orderBy('views', 'desc')
            ->whereHas('category', function ($query) {
                $query->where('name', 'project');
            })
            ->take(5)
            ->get(); // Artikel populer berdasarkan jumlah tampilan dalam 7 hari terakhir

        if ($latestArticle === null) {
            return view('blog', [
                'latestArticle' => null,
                'articles' => collect([]), // Use an empty collection instead of an array
                'popularArticles' => collect([]), // Use an empty collection instead of an array
                'articlesProject' => collect([]), // Use an empty collection instead of an array
            ])->with('error', 'No articles available at the moment. Please check back later.');
        }

        return view('blog', compact('latestArticle', 'articles', 'popularArticles', 'articlesProject'));
    }

    public function show(Request $request, $slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        // Cek apakah pengguna sudah melihat artikel ini dalam sesi
        $viewedArticles = $request->session()->get('viewed_articles', []);

        if (!in_array($article->id, $viewedArticles)) {
            // Jika belum, tambahkan views
            $article->increment('views');

            // Simpan dalam sesi agar tidak bertambah saat refresh
            $viewedArticles[] = $article->id;
            $request->session()->put('viewed_articles', $viewedArticles);
        }

        return view('articles.show', compact('article'));
    }
}