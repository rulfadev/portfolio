<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'email', 'phone', 'website_type', 'budget_range', 'timeline', 'message', 'status', 'source', 'ip_address', 'user_agent', 'contacted_at', 'admin_notes'])]

class ProjectInquiry extends Model
{
    protected function casts(): array
    {
        return [
            'contacted_at' => 'datetime',
        ];
    }

    public const STATUSES = [
        'new' => 'New',
        'contacted' => 'Contacted',
        'in_progress' => 'In Progress',
        'closed' => 'Closed',
        'spam' => 'Spam',
    ];

    public static function websiteTypes(): array
    {
        return [
            'landing_page' => 'Landing Page',
            'company_profile' => 'Company Profile',
            'ecommerce' => 'Ecommerce Website',
            'custom_web_app' => 'Custom Web App',
            'redesign' => 'Redesign Website',
            'maintenance' => 'Website Maintenance',
            'other' => 'Lainnya',
        ];
    }

    public static function budgetRanges(): array
    {
        return [
            'under_1m' => '< Rp1.000.000',
            '1m_3m' => 'Rp1.000.000 - Rp3.000.000',
            '3m_5m' => 'Rp3.000.000 - Rp5.000.000',
            '5m_10m' => 'Rp5.000.000 - Rp10.000.000',
            'above_10m' => '> Rp10.000.000',
            'discuss' => 'Diskusikan dulu',
        ];
    }

    public static function timelines(): array
    {
        return [
            'asap' => 'Secepatnya',
            '1_2_weeks' => '1 - 2 Minggu',
            '1_month' => 'Sekitar 1 Bulan',
            'flexible' => 'Fleksibel',
        ];
    }
}
