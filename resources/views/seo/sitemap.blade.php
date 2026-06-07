{!! '<?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ route('home') }}</loc>
        <lastmod>{{ $lastmod->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>{{ route('projects.index') }}</loc>
        <lastmod>{{ $lastmod->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.90</priority>
    </url>

    <url>
        <loc>{{ route('contact') }}</loc>
        <lastmod>{{ $lastmod->toAtomString() }}</lastmod>
        <changefreq>monthly</changefreq>
        <priority>0.80</priority>
    </url>

    @foreach ($projects as $project)
        <url>
            <loc>{{ route('projects.show', $project) }}</loc>
            <lastmod>{{ optional($project->updated_at)->toAtomString() }}</lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.75</priority>
        </url>
    @endforeach
</urlset>
