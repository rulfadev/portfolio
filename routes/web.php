<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BrandController as AdminBrandController;
use App\Http\Controllers\Admin\ClientReviewLinkController as AdminClientReviewLinkController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SiteSettingController as AdminSiteSettingController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\ClientReviewController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SeoController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/review/{token}', [ClientReviewController::class, 'edit'])->name('client-reviews.edit');
Route::put('/review/{token}', [ClientReviewController::class, 'update'])->name('client-reviews.update');

Route::get('/sitemap.xml', [SeoController::class, 'sitemap'])->name('seo.sitemap');
Route::get('/robots.txt', [SeoController::class, 'robots'])->name('seo.robots');

Route::middleware('guest')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.store');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', AdminDashboardController::class)->name('dashboard');

    Route::get('/settings', [AdminSiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [AdminSiteSettingController::class, 'update'])->name('settings.update');

    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('inquiries.index');
    Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('inquiries.show');
    Route::put('/inquiries/{inquiry}', [AdminInquiryController::class, 'update'])->name('inquiries.update');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('inquiries.destroy');

    Route::get('/review-links', [AdminClientReviewLinkController::class, 'index'])->name('review-links.index');
    Route::get('/review-links/create', [AdminClientReviewLinkController::class, 'create'])->name('review-links.create');
    Route::post('/review-links', [AdminClientReviewLinkController::class, 'store'])->name('review-links.store');
    Route::get('/review-links/{reviewLink}', [AdminClientReviewLinkController::class, 'show'])->name('review-links.show');
    Route::patch('/review-links/{reviewLink}/toggle', [AdminClientReviewLinkController::class, 'toggle'])->name('review-links.toggle');
    Route::delete('/review-links/{reviewLink}', [AdminClientReviewLinkController::class, 'destroy'])->name('review-links.destroy');

    Route::resource('projects', AdminProjectController::class)
        ->except(['show']);
    Route::resource('services', AdminServiceController::class)
        ->except(['show']);
    Route::resource('brands', AdminBrandController::class)
        ->except(['show']);
    Route::resource('testimonials', AdminTestimonialController::class)
        ->except(['show']);
});
