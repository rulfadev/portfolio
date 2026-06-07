<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientReviewLink;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ClientReviewLinkController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $status = $request->string('status')->toString();

        $reviewLinks = ClientReviewLink::query()
            ->with(['project', 'review'])
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('client_name', 'like', "%{$search}%")
                        ->orWhere('client_email', 'like', "%{$search}%")
                        ->orWhere('client_phone', 'like', "%{$search}%")
                        ->orWhereHas('project', function ($projectQuery) use ($search) {
                            $projectQuery->where('title', 'like', "%{$search}%");
                        });
                });
            })
            ->when($status === 'active', fn ($query) => $query->where('is_active', true))
            ->when($status === 'inactive', fn ($query) => $query->where('is_active', false))
            ->when($status === 'submitted', fn ($query) => $query->has('review'))
            ->when($status === 'empty', fn ($query) => $query->doesntHave('review'))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.review-links.index', [
            'reviewLinks' => $reviewLinks,
            'search' => $search,
            'status' => $status,
        ]);
    }

    public function create(): View
    {
        return view('admin.review-links.create', [
            'projects' => Project::query()
                ->where('is_active', true)
                ->orderBy('title')
                ->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'project_id' => ['nullable', 'exists:projects,id'],
            'client_name' => ['required', 'string', 'max:255'],
            'client_email' => ['nullable', 'email', 'max:255'],
            'client_phone' => ['nullable', 'string', 'max:30'],
            'expires_at' => ['nullable', 'date', 'after:now'],
        ]);

        $validated['client_phone'] = $this->normalizePhone($validated['client_phone'] ?? null);
        $validated['token'] = Str::random(64);
        $validated['is_active'] = true;

        $reviewLink = ClientReviewLink::query()->create($validated);

        return redirect()
            ->route('admin.review-links.show', $reviewLink)
            ->with('success', 'Link penilaian client berhasil dibuat.');
    }

    public function show(ClientReviewLink $reviewLink): View
    {
        $reviewLink->load(['project', 'review']);

        return view('admin.review-links.show', [
            'reviewLink' => $reviewLink,
        ]);
    }

    public function toggle(ClientReviewLink $reviewLink): RedirectResponse
    {
        $reviewLink->update([
            'is_active' => ! $reviewLink->is_active,
        ]);

        return redirect()
            ->route('admin.review-links.show', $reviewLink)
            ->with('success', $reviewLink->is_active ? 'Link berhasil diaktifkan.' : 'Link berhasil dinonaktifkan.');
    }

    public function destroy(ClientReviewLink $reviewLink): RedirectResponse
    {
        if ($reviewLink->review) {
            return redirect()
                ->route('admin.review-links.show', $reviewLink)
                ->with('error', 'Link tidak bisa dihapus karena sudah memiliki penilaian client. Nonaktifkan link jika tidak ingin digunakan lagi.');
        }

        $reviewLink->delete();

        return redirect()
            ->route('admin.review-links.index')
            ->with('success', 'Link penilaian berhasil dihapus.');
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
