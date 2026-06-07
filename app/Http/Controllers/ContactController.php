<?php

namespace App\Http\Controllers;

use App\Models\ProjectInquiry;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('pages.contact', [
            'siteSettings' => SiteSetting::asArray(),
            'websiteTypes' => ProjectInquiry::websiteTypes(),
            'budgetRanges' => ProjectInquiry::budgetRanges(),
            'timelines' => ProjectInquiry::timelines(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email', 'max:150'],
            'phone' => ['nullable', 'string', 'max:30'],

            'website_type' => ['nullable', 'string', 'max:80'],
            'budget_range' => ['nullable', 'string', 'max:80'],
            'timeline' => ['nullable', 'string', 'max:80'],

            'message' => ['required', 'string', 'min:10', 'max:3000'],
        ]);

        $validated['phone'] = $this->normalizePhone($validated['phone'] ?? null);
        $validated['status'] = 'new';
        $validated['source'] = 'contact_page';
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();

        ProjectInquiry::query()->create($validated);

        return redirect()
            ->route('contact')
            ->with('success', 'Terima kasih. Pesan Anda berhasil dikirim. Saya akan menghubungi Anda melalui kontak bisnis yang diberikan.');
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
