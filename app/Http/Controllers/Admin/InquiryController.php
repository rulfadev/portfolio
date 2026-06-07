<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectInquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class InquiryController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->string('search')->toString();
        $status = $request->string('status')->toString();
        $websiteType = $request->string('website_type')->toString();

        $inquiries = ProjectInquiry::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($subQuery) use ($search) {
                    $subQuery
                        ->where('name', 'like', "%{$search}%")
                        ->orWhere('email', 'like', "%{$search}%")
                        ->orWhere('phone', 'like', "%{$search}%")
                        ->orWhere('message', 'like', "%{$search}%");
                });
            })
            ->when($status, fn ($query) => $query->where('status', $status))
            ->when($websiteType, fn ($query) => $query->where('website_type', $websiteType))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.inquiries.index', [
            'inquiries' => $inquiries,
            'search' => $search,
            'status' => $status,
            'websiteType' => $websiteType,
            'statuses' => ProjectInquiry::STATUSES,
            'websiteTypes' => ProjectInquiry::websiteTypes(),
        ]);
    }

    public function show(ProjectInquiry $inquiry): View
    {
        return view('admin.inquiries.show', [
            'inquiry' => $inquiry,
            'statuses' => ProjectInquiry::STATUSES,
            'websiteTypes' => ProjectInquiry::websiteTypes(),
            'budgetRanges' => ProjectInquiry::budgetRanges(),
            'timelines' => ProjectInquiry::timelines(),
        ]);
    }

    public function update(Request $request, ProjectInquiry $inquiry): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', Rule::in(array_keys(ProjectInquiry::STATUSES))],
            'admin_notes' => ['nullable', 'string', 'max:3000'],
        ]);

        if ($validated['status'] === 'contacted' && $inquiry->status !== 'contacted') {
            $validated['contacted_at'] = now();
        }

        $inquiry->update($validated);

        return redirect()
            ->route('admin.inquiries.show', $inquiry)
            ->with('success', 'Inquiry berhasil diperbarui.');
    }

    public function destroy(ProjectInquiry $inquiry): RedirectResponse
    {
        $inquiry->delete();

        return redirect()
            ->route('admin.inquiries.index')
            ->with('success', 'Inquiry berhasil dihapus.');
    }
}
