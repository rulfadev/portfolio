<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $type = $request->string('type')->toString();
        $status = $request->string('status')->toString();

        $brands = Brand::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('type', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%");
                });
            })
            ->when($type, fn ($query) => $query->where('type', $type))
            ->when($status !== '', function ($query) use ($status) {
                $query->where('is_active', $status === 'active');
            })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.brands.index', compact('brands', 'search', 'type', 'status'));
    }

    public function create(): View
    {
        return view('admin.brands.create', [
            'brand' => new Brand,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $this->validatedData($request);

        $validated['logo'] = $this->storeLogo($request);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        Brand::query()->create($validated);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand berhasil ditambahkan.');
    }

    public function edit(Brand $brand): View
    {
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $validated = $this->validatedData($request, $brand);

        $validated['logo'] = $this->resolveLogoUpdate($request, $brand);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_active'] = $request->boolean('is_active');

        $brand->update($validated);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand berhasil diperbarui.');
    }

    public function destroy(Brand $brand): RedirectResponse
    {
        $this->deleteFileIfLocal($brand->logo);

        $brand->delete();

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand berhasil dihapus.');
    }

    private function validatedData(Request $request, ?Brand $brand = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'type' => [
                'required',
                'string',
                Rule::in([
                    'collaboration',
                    'brand-built',
                    'client',
                    'internal',
                    'partner',
                ]),
            ],

            'logo' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'remove_logo' => ['nullable', 'boolean'],

            'website' => ['nullable', 'url', 'max:255'],
            'description' => ['nullable', 'string', 'max:1200'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function storeLogo(Request $request): ?string
    {
        if (! $request->hasFile('logo')) {
            return null;
        }

        return $request
            ->file('logo')
            ->store('brands/logos', 'public');
    }

    private function resolveLogoUpdate(Request $request, Brand $brand): ?string
    {
        $currentLogo = $brand->logo;

        if ($request->boolean('remove_logo')) {
            $this->deleteFileIfLocal($currentLogo);
            $currentLogo = null;
        }

        if ($request->hasFile('logo')) {
            $this->deleteFileIfLocal($currentLogo);

            return $request
                ->file('logo')
                ->store('brands/logos', 'public');
        }

        return $currentLogo;
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
