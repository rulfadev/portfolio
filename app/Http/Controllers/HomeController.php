<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\ClientReview;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('pages.home', [
            'siteSettings' => SiteSetting::asArray(),

            'services' => Service::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get(),

            'featuredProjects' => Project::query()
                ->where('is_active', true)
                ->where('is_featured', true)
                ->orderBy('sort_order')
                ->limit(6)
                ->get(),

            'brands' => Brand::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get(),

            'testimonials' => Testimonial::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->get(),

            'displayTestimonials' => $this->displayTestimonials(),

            'websitePackages' => $this->websitePackages(),

            'techStacks' => $this->techStacks(),
        ]);
    }

    private function displayTestimonials(): Collection
    {
        $clientReviews = ClientReview::query()
            ->with(['project', 'reviewLink'])
            ->where('consent_to_publish', true)
            ->latest('updated_at')
            ->get()
            ->toBase()
            ->map(function (ClientReview $review) {
                return [
                    'source' => 'client_review',
                    'label' => 'Verified Client Review',
                    'name' => $review->client_name ?: 'Private Client',
                    'role' => $review->client_role ?: 'Client',
                    'company' => $review->company,
                    'message' => $review->message,
                    'rating' => $review->rating,
                    'project_title' => $review->project?->title,
                    'date' => $review->updated_at,
                ];
            });

        $manualTestimonials = Testimonial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest()
            ->get()
            ->toBase()
            ->map(function (Testimonial $testimonial) {
                return [
                    'source' => 'manual',
                    'label' => 'Client Testimonial',
                    'name' => $testimonial->is_anonymous ? 'Private Client' : ($testimonial->name ?: 'Client'),
                    'role' => $testimonial->role ?: 'Client',
                    'company' => $testimonial->company,
                    'message' => $testimonial->message,
                    'rating' => $testimonial->rating,
                    'project_title' => null,
                    'date' => $testimonial->updated_at,
                ];
            });

        return $clientReviews
            ->merge($manualTestimonials)
            ->sortByDesc('date')
            ->take(9)
            ->values();
    }

    private function websitePackages(): array
    {
        return [
            [
                'name' => 'Landing Page',
                'label' => 'Promosi Cepat',
                'description' => 'Cocok untuk campaign, promosi produk, personal brand, dan halaman penawaran yang fokus ke konversi.',
                'features' => [
                    'Desain modern dan responsive',
                    'CTA WhatsApp / email',
                    'SEO basic',
                    'Fast loading',
                ],
            ],
            [
                'name' => 'Company Profile',
                'label' => 'Bisnis Profesional',
                'description' => 'Website profil bisnis untuk menampilkan layanan, keunggulan, brand, portfolio, dan informasi kontak.',
                'features' => [
                    'Halaman layanan',
                    'Profil brand',
                    'Portfolio / gallery',
                    'SEO company profile',
                ],
                'highlight' => true,
            ],
            [
                'name' => 'Ecommerce Website',
                'label' => 'Jualan Online',
                'description' => 'Website toko online dengan katalog produk, detail produk, keranjang, dan checkout WhatsApp.',
                'features' => [
                    'Katalog produk',
                    'Cart dan checkout',
                    'Admin produk',
                    'Integrasi WhatsApp',
                ],
            ],
            [
                'name' => 'Custom Web App',
                'label' => 'Sistem Khusus',
                'description' => 'Aplikasi web custom seperti dashboard, sistem keuangan, sistem member, laporan, dan admin panel.',
                'features' => [
                    'Role management',
                    'Dashboard admin',
                    'Database design',
                    'Report system',
                ],
            ],
        ];
    }

    private function techStacks(): array
    {
        return [
            'Languages' => [
                'HTML',
                'CSS',
                'JavaScript',
                'TypeScript',
                'PHP',
            ],

            'Frameworks' => [
                'Laravel',
                'React.js',
                'Next.js',
                'Blade',
                'Express.js',
            ],

            'Libraries' => [
                'Tailwind CSS',
                'Bootstrap',
                'Axios',
                'React Hook Form',
                'SweetAlert2',
            ],

            'Database & Backend' => [
                'MySQL',
                'Firebase',
                'MongoDB',
                'REST API',
            ],

            'Cloud & Deployment' => [
                'Vercel',
                'Netlify',
                'GitHub Pages',
            ],

            'Tools & Platforms' => [
                'Git',
                'GitHub',
                'Visual Studio Code',
                'Figma',
                'Postman',
            ],

            'Package Managers & Build Tools' => [
                'NPM',
                'Vite',
                'Composer',
                'Webpack',
            ],
        ];
    }
}
