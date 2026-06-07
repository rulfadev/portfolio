<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Response;

class SeoController extends Controller
{
    public function sitemap(): Response
    {
        $projects = Project::query()
            ->where('is_active', true)
            ->latest('updated_at')
            ->get(['title', 'slug', 'updated_at']);

        return response()
            ->view('seo.sitemap', [
                'projects' => $projects,
                'lastmod' => now(),
            ])
            ->header('Content-Type', 'application/xml');
    }

    public function robots(): Response
    {
        $content = view('seo.robots', [
            'sitemapUrl' => url('/sitemap.xml'),
        ])->render();

        return response($content, 200)
            ->header('Content-Type', 'text/plain');
    }
}
