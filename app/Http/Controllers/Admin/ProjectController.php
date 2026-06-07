<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $status = $request->string('status')->toString();

        $projects = Project::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('title', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%")
                        ->orWhere('summary', 'like', "%{$search}%");
                });
            })
            ->when($status, fn ($query) => $query->where('status', $status))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.projects.index', compact('projects', 'search', 'status'));
    }

    public function create(): View
    {
        return view('admin.projects.create', [
            'project' => new Project,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        $validated['slug'] = $this->generateUniqueSlug(
            ($validated['slug'] ?? '') ?: $validated['title']
        );

        $validated['features'] = $this->linesToArray($request->input('features_text'));
        $validated['tech_stack'] = $this->linesToArray($request->input('tech_stack_text'));

        $validated['thumbnail'] = $this->storeThumbnail($request);
        $validated['gallery'] = $this->storeGallery($request);

        $validated['is_client_private'] = $request->boolean('is_client_private');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        unset(
            $validated['features_text'],
            $validated['tech_stack_text'],
            $validated['remove_thumbnail'],
            $validated['remove_gallery']
        );

        Project::query()->create($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $this->validatedData($request, $project);

        $validated['slug'] = $this->generateUniqueSlug(
            ($validated['slug'] ?? '') ?: $validated['title'],
            $project->id
        );

        $validated['features'] = $this->linesToArray($request->input('features_text'));
        $validated['tech_stack'] = $this->linesToArray($request->input('tech_stack_text'));

        $validated['thumbnail'] = $this->resolveThumbnailUpdate($request, $project);
        $validated['gallery'] = $this->resolveGalleryUpdate($request, $project);

        $validated['is_client_private'] = $request->boolean('is_client_private');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        unset(
            $validated['features_text'],
            $validated['tech_stack_text'],
            $validated['remove_thumbnail'],
            $validated['remove_gallery']
        );

        $project->update($validated);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project): RedirectResponse
    {
        $this->deleteFileIfLocal($project->thumbnail);

        foreach (($project->gallery ?? []) as $image) {
            $this->deleteFileIfLocal($image);
        }

        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Project $project = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('projects', 'slug')->ignore($project?->id),
            ],

            'category' => ['nullable', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],

            'summary' => ['required', 'string', 'max:1000'],
            'description' => ['nullable', 'string'],

            'problem' => ['nullable', 'string'],
            'solution' => ['nullable', 'string'],
            'result' => ['nullable', 'string'],

            'features_text' => ['nullable', 'string'],
            'tech_stack_text' => ['nullable', 'string'],

            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:3072'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096'],

            'remove_thumbnail' => ['nullable', 'boolean'],
            'remove_gallery' => ['nullable', 'array'],
            'remove_gallery.*' => ['nullable', 'string'],

            'demo_url' => ['nullable', 'url', 'max:255'],
            'repo_url' => ['nullable', 'url', 'max:255'],

            'status' => ['required', 'string', Rule::in(['private', 'demo', 'live'])],
            'year' => ['nullable', 'integer', 'min:2000', 'max:'.now()->addYears(2)->year],

            'seo_title' => ['nullable', 'string', 'max:255'],
            'seo_description' => ['nullable', 'string', 'max:500'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function generateUniqueSlug(string $value, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($value);
        $slug = $baseSlug;
        $counter = 2;

        while (
            Project::query()
                ->where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->whereKeyNot($ignoreId))
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    private function linesToArray(?string $value): array
    {
        if (! $value) {
            return [];
        }

        return collect(preg_split('/\r\n|\r|\n/', $value))
            ->map(fn ($item) => trim($item))
            ->filter()
            ->values()
            ->toArray();
    }

    private function storeThumbnail(Request $request): ?string
    {
        if (! $request->hasFile('thumbnail')) {
            return null;
        }

        return $request
            ->file('thumbnail')
            ->store('projects/thumbnails', 'public');
    }

    private function storeGallery(Request $request): array
    {
        if (! $request->hasFile('gallery')) {
            return [];
        }

        return collect($request->file('gallery'))
            ->map(fn ($file) => $file->store('projects/gallery', 'public'))
            ->values()
            ->toArray();
    }

    private function resolveThumbnailUpdate(Request $request, Project $project): ?string
    {
        $currentThumbnail = $project->thumbnail;

        if ($request->boolean('remove_thumbnail')) {
            $this->deleteFileIfLocal($currentThumbnail);
            $currentThumbnail = null;
        }

        if ($request->hasFile('thumbnail')) {
            $this->deleteFileIfLocal($currentThumbnail);

            return $request
                ->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        return $currentThumbnail;
    }

    private function resolveGalleryUpdate(Request $request, Project $project): array
    {
        $currentGallery = collect($project->gallery ?? [])
            ->filter()
            ->values();

        $removeGallery = collect($request->input('remove_gallery', []))
            ->filter()
            ->values();

        if ($removeGallery->isNotEmpty()) {
            $removeGallery->each(fn ($image) => $this->deleteFileIfLocal($image));

            $currentGallery = $currentGallery
                ->reject(fn ($image) => $removeGallery->contains($image))
                ->values();
        }

        if ($request->hasFile('gallery')) {
            $newImages = collect($request->file('gallery'))
                ->map(fn ($file) => $file->store('projects/gallery', 'public'));

            $currentGallery = $currentGallery
                ->merge($newImages)
                ->values();
        }

        return $currentGallery->toArray();
    }

    private function deleteFileIfLocal(?string $path): void
    {
        if (! $path) {
            return;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return;
        }

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
