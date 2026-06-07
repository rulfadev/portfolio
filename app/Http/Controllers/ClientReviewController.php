<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Models\ClientReviewLink;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientReviewController extends Controller
{
    public function edit(string $token): View
    {
        $reviewLink = ClientReviewLink::query()
            ->with(['project', 'review'])
            ->where('token', $token)
            ->firstOrFail();

        return view('pages.client-reviews.form', [
            'siteSettings' => SiteSetting::asArray(),
            'reviewLink' => $reviewLink,
            'review' => $reviewLink->review,
        ]);
    }

    public function update(Request $request, string $token): RedirectResponse
    {
        $reviewLink = ClientReviewLink::query()
            ->with('review')
            ->where('token', $token)
            ->firstOrFail();

        abort_unless($reviewLink->can_be_used, 403);

        $validated = $request->validate([
            'client_name' => ['required', 'string', 'max:255'],
            'client_role' => ['nullable', 'string', 'max:255'],
            'company' => ['nullable', 'string', 'max:255'],

            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
            'suggestions' => ['nullable', 'string', 'max:2000'],

            'consent_to_publish' => ['nullable', 'boolean'],
        ]);

        $validated['client_review_link_id'] = $reviewLink->id;
        $validated['project_id'] = $reviewLink->project_id;
        $validated['consent_to_publish'] = $request->boolean('consent_to_publish');
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = $request->userAgent();
        $validated['submitted_at'] = $reviewLink->review?->submitted_at ?? now();

        ClientReview::query()->updateOrCreate(
            ['client_review_link_id' => $reviewLink->id],
            $validated
        );

        return redirect()
            ->route('client-reviews.edit', $reviewLink->token)
            ->with('success', 'Terima kasih. Penilaian Anda berhasil disimpan. Anda masih bisa mengubah penilaian melalui link ini selama link masih aktif.');
    }
}
