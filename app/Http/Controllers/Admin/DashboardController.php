<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ClientReview;
use App\Models\ClientReviewLink;
use App\Models\Project;
use App\Models\ProjectInquiry;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'totalProjects' => Project::query()->count(),
            'activeProjects' => Project::query()->where('is_active', true)->count(),
            'featuredProjects' => Project::query()->where('is_featured', true)->count(),

            'totalServices' => Service::query()->count(),
            'activeServices' => Service::query()->where('is_active', true)->count(),

            'totalBrands' => Brand::query()->count(),
            'activeBrands' => Brand::query()->where('is_active', true)->count(),

            'totalTestimonials' => Testimonial::query()->count(),
            'activeTestimonials' => Testimonial::query()->where('is_active', true)->count(),

            'totalInquiries' => ProjectInquiry::query()->count(),
            'newInquiries' => ProjectInquiry::query()->where('status', 'new')->count(),
            'inProgressInquiries' => ProjectInquiry::query()->where('status', 'in_progress')->count(),

            'totalReviewLinks' => ClientReviewLink::query()->count(),
            'activeReviewLinks' => ClientReviewLink::query()->where('is_active', true)->count(),

            'totalClientReviews' => ClientReview::query()->count(),
            'publishedClientReviews' => ClientReview::query()->where('consent_to_publish', true)->count(),

            'latestProjects' => Project::query()
                ->latest()
                ->limit(5)
                ->get(),

            'latestInquiries' => ProjectInquiry::query()
                ->latest()
                ->limit(5)
                ->get(),

            'latestReviewLinks' => ClientReviewLink::query()
                ->with(['project', 'review'])
                ->latest()
                ->limit(5)
                ->get(),
        ]);
    }
}
