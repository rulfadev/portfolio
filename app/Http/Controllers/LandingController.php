<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LandingController extends Controller
{
    public function index()
    {
        // Github API

        $username = 'rulfadev'; // Ganti dengan username kamu
        // $token = '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';

        // $response = Http::withToken($token)
        //     ->get("https://api.github.com/users/{$username}/repos?per_page=6&sort=updated&direction=desc");
        // $response = Http::get("https://api.github.com/users/rulfadev/repos?per_page=6&sort=updated&direction=desc");

        // if (!$response->successful()) {
        //     $repositories = collect([]);
        // } else {
        //     if ($response->status() === 403 || $response->status() === 404) {
        //         $repositories = collect([]);
        //     }
        //     $repositories = $response->json();
        // }

        $response = json_decode(file_get_contents(resource_path('data/dummygit.json')), true); // dumy data
        $repositories = collect($response)
            ->sortByDesc('updated_at')
            ->take(6)
            ->map(function ($repo) {
                $repo['description'] = str()->limit($repo['description'], 50);
                return $repo;
            })
            ->values()
            ->all();

        // Articles

        // $latestArticle = Article::whereHas('category', function ($query) {
        //     $query->where('name', 'project');
        // })->latest()->first();
        // $articles = Article::where('id', '!=', optional($latestArticle)->id)
        //     ->whereDoesntHave('category', function ($query) {
        //         $query->where('name', 'project');
        //     })
        //     ->orderBy('id', 'desc')->paginate(6);
        // $articlesProject = Article::where('id', '!=', optional($latestArticle)->id)
        //     ->whereHas('category', function ($query) {
        //         $query->where('name', 'project');
        //     })
        //     ->orderBy('id', 'desc')
        //     ->paginate(2);
        // $popularArticles = Article::where('created_at', '>=', now()->subDays(7))
        //     ->orderBy('views', 'desc')
        //     ->whereHas('category', function ($query) {
        //         $query->where('name', 'project');
        //     })
        //     ->take(5)
        //     ->get();

        // if ($latestArticle === null || $articles->isEmpty() || $articlesProject->isEmpty() || $popularArticles->isEmpty()) {
        //     return view('blog', [
        //         'latestArticle' => null,
        //         'articles' => collect([]),
        //         'popularArticles' => collect([]),
        //         'articlesProject' => collect([]),
        //         'repositories' => $repositories,
        //     ])->with('error', 'No articles available at the moment. Please check back later.');
        // }

        // return view('blog', compact('latestArticle', 'articles', 'popularArticles', 'articlesProject', 'repositories'));
        return view('blog', compact('repositories'));
    }
}