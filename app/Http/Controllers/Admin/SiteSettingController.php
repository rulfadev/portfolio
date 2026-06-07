<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.edit', [
            'settings' => SiteSetting::asArray(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'brand_name' => ['required', 'string', 'max:100'],
            'brand_tagline' => ['nullable', 'string', 'max:180'],

            'hero_title' => ['required', 'string', 'max:255'],
            'hero_description' => ['required', 'string', 'max:600'],

            'business_email' => ['nullable', 'email', 'max:150'],
            'business_phone' => ['nullable', 'string', 'max:30'],
            'business_whatsapp' => ['nullable', 'string', 'max:30'],
            'location_label' => ['nullable', 'string', 'max:100'],

            'seo_title' => ['required', 'string', 'max:255'],
            'seo_description' => ['required', 'string', 'max:500'],
            'seo_keywords' => ['nullable', 'string', 'max:1000'],

            'site_logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'remove_site_logo' => ['nullable', 'boolean'],

            'site_favicon' => ['nullable', 'file', 'mimes:ico,png,jpg,jpeg,webp,svg', 'max:1024'],
            'remove_site_favicon' => ['nullable', 'boolean'],
        ]);

        $validated['business_phone'] = $this->normalizePhone($validated['business_phone'] ?? null);
        $validated['business_whatsapp'] = $this->normalizePhone($validated['business_whatsapp'] ?? null);

        $settingsData = Arr::except($validated, [
            'site_logo',
            'remove_site_logo',
            'site_favicon',
            'remove_site_favicon',
        ]);

        foreach ($settingsData as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $this->handleLogoUpload($request);
        $this->handleFaviconUpload($request);

        return redirect()
            ->route('admin.settings.edit')
            ->with('success', 'Site settings berhasil diperbarui.');
    }

    private function handleLogoUpload(Request $request): void
    {
        $currentLogo = SiteSetting::getValue('site_logo');

        if ($request->boolean('remove_site_logo')) {
            $this->deleteFileIfLocal($currentLogo);

            SiteSetting::query()->updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => null]
            );

            $currentLogo = null;
        }

        if ($request->hasFile('site_logo')) {
            $this->deleteFileIfLocal($currentLogo);

            $path = $request
                ->file('site_logo')
                ->store('site/logo', 'public');

            SiteSetting::query()->updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $path]
            );
        }
    }

    private function handleFaviconUpload(Request $request): void
    {
        $currentFavicon = SiteSetting::getValue('site_favicon');

        if ($request->boolean('remove_site_favicon')) {
            $this->deleteFileIfLocal($currentFavicon);

            SiteSetting::query()->updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => null]
            );

            $currentFavicon = null;
        }

        if ($request->hasFile('site_favicon')) {
            $this->deleteFileIfLocal($currentFavicon);

            $path = $request
                ->file('site_favicon')
                ->store('site/favicon', 'public');

            SiteSetting::query()->updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $path]
            );
        }
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

    private function normalizePhone(?string $value): ?string
    {
        if (! $value) {
            return null;
        }

        $number = preg_replace('/[^0-9]/', '', $value);

        if (str_starts_with($number, '0')) {
            return '62'.substr($number, 1);
        }

        return $number;
    }
}
