<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@rulfadev.com')],
            [
                'name' => 'RulfaDev Admin',
                'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
            ]
        );

        $settings = [
            'brand_name' => 'RulfaDev',
            'brand_tagline' => 'Web Developer & Digital Solution Builder',
            'hero_title' => 'Website modern, cepat, dan elegan untuk bisnis yang ingin tampil profesional.',
            'hero_description' => 'RulfaDev membantu UMKM, komunitas, dan brand membangun website responsif, SEO-friendly, dan mudah dikelola.',
            'business_email' => env('BUSINESS_EMAIL', 'hello@rulfadev.com'),
            'business_phone' => env('BUSINESS_PHONE', '6281234567890'),
            'business_whatsapp' => env('BUSINESS_WHATSAPP', '6281234567890'),
            'location_label' => 'Indonesia',
            'seo_title' => 'RulfaDev - Web Developer & Jasa Pembuatan Website Profesional',
            'seo_description' => 'RulfaDev membantu bisnis, UMKM, komunitas, dan brand membangun website modern, responsif, SEO-friendly, dan mudah dikelola.',
            'seo_keywords' => 'web developer indonesia, jasa pembuatan website, laravel developer, website company profile, website ecommerce, portfolio web developer',
        ];

        foreach ($settings as $key => $value) {
            SiteSetting::query()->updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $services = [
            [
                'title' => 'Company Profile Website',
                'description' => 'Website profesional untuk memperkenalkan bisnis, layanan, brand, dan kredibilitas Anda.',
                'features' => ['Responsive design', 'SEO basic', 'Fast loading', 'Contact CTA'],
            ],
            [
                'title' => 'Ecommerce Website',
                'description' => 'Toko online modern dengan katalog produk, cart, checkout, dan integrasi WhatsApp.',
                'features' => ['Product catalog', 'Cart & checkout', 'WhatsApp order', 'Admin produk'],
            ],
            [
                'title' => 'Custom Web Application',
                'description' => 'Aplikasi web custom seperti dashboard, sistem keuangan, sistem member, dan admin panel.',
                'features' => ['Role management', 'Dashboard', 'Database design', 'Report system'],
            ],
            [
                'title' => 'Website Redesign',
                'description' => 'Meningkatkan tampilan website lama agar lebih modern, rapi, dan mudah digunakan.',
                'features' => ['UI improvement', 'Mobile responsive', 'Performance cleanup', 'Better UX'],
            ],
        ];

        foreach ($services as $index => $service) {
            Service::query()->updateOrCreate(
                ['slug' => Str::slug($service['title'])],
                [
                    ...$service,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }

        $projects = [
            [
                'title' => 'Raden Club Finance System',
                'category' => 'Web Application',
                'summary' => 'Sistem pencatatan keuangan komunitas dengan role admin dan pengelolaan transaksi per divisi.',
                'problem' => 'Pencatatan keuangan komunitas masih tersebar dan sulit dipantau antar divisi.',
                'solution' => 'Membangun sistem dashboard dengan manajemen transaksi, kategori, divisi, dan laporan.',
                'result' => 'Pengelolaan data keuangan menjadi lebih rapi, transparan, dan mudah dipantau.',
                'features' => ['Dashboard admin', 'Role management', 'Transaksi masuk/keluar', 'Laporan divisi'],
                'tech_stack' => ['Laravel', 'Tailwind CSS', 'MySQL'],
                'status' => 'private',
                'year' => 2026,
                'is_featured' => true,
            ],
            [
                'title' => 'Local Business Ecommerce',
                'category' => 'Ecommerce',
                'summary' => 'Website toko online untuk menampilkan produk, detail produk, cart, dan checkout WhatsApp.',
                'problem' => 'Bisnis membutuhkan katalog produk online yang mudah dibuka dari mobile.',
                'solution' => 'Membangun ecommerce ringan dengan UI responsif dan alur checkout sederhana.',
                'result' => 'Customer lebih mudah melihat produk dan melakukan pemesanan.',
                'features' => ['Katalog produk', 'Detail produk', 'Cart', 'Checkout WhatsApp'],
                'tech_stack' => ['CodeIgniter 4', 'Bootstrap', 'MySQL'],
                'status' => 'private',
                'year' => 2026,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $index => $project) {
            Project::query()->updateOrCreate(
                ['slug' => Str::slug($project['title'])],
                [
                    ...$project,
                    'client_name' => null,
                    'is_client_private' => true,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                    'seo_title' => $project['title'].' - Project Portfolio RulfaDev',
                    'seo_description' => $project['summary'],
                ]
            );
        }

        $brands = [
            [
                'name' => 'Raden Club',
                'type' => 'brand-built',
                'description' => 'Brand komunitas olahraga dan esports dengan kebutuhan sistem digital internal.',
                'is_featured' => true,
            ],
            [
                'name' => 'Private Ecommerce Brand',
                'type' => 'collaboration',
                'description' => 'Brand bisnis lokal dengan kebutuhan katalog dan pemesanan online.',
                'is_featured' => true,
            ],
        ];

        foreach ($brands as $index => $brand) {
            Brand::query()->updateOrCreate(
                ['name' => $brand['name']],
                [
                    ...$brand,
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }

        Testimonial::query()->updateOrCreate(
            ['name' => 'Owner UMKM'],
            [
                'role' => 'Business Owner',
                'company' => 'Private Client',
                'message' => 'Website menjadi lebih rapi, profesional, dan mudah digunakan dari perangkat mobile.',
                'rating' => 5,
                'is_anonymous' => true,
                'is_active' => true,
                'sort_order' => 1,
            ]
        );
    }
}
