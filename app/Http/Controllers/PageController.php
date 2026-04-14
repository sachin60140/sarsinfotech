<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    private $services = [
        'bulk-sms' => [
            'name' => 'Bulk SMS Service',
            'desc' => 'High-delivery communication channels tailored for enterprise scale.',
            'benefits' => ['Instant Delivery', 'High ROI', 'Global Reach', 'Dynamic Sender ID']
        ],
        'rcs' => [
            'name' => 'RCS Messaging',
            'desc' => 'Rich Communication Services to bring an app-like experience to native messaging.',
            'benefits' => ['Verified Sender', 'Rich Media Cards', 'Interactive Buttons', 'Read Receipts']
        ],
        'whatsapp-api' => [
            'name' => 'WhatsApp API Solutions',
            'desc' => 'Engage your customers on the world\'s most popular messaging app using powerful automation.',
            'benefits' => ['Automated Replies', 'Secure E2E Encryption', 'Rich Media Support', 'High Engagement']
        ],
        'custom-software' => [
            'name' => 'Custom Software Development',
            'desc' => 'Bespoke web and mobile applications designed to optimize your internal workflows and offerings.',
            'benefits' => ['Scalable Architecture', 'Secure Infrastructure', 'Agile Methodology', 'Cross-Platform App Development']
        ],
        'seo' => [
            'name' => 'SEO Services',
            'desc' => 'Dominant search rankings and continuous traffic generation strategies.',
            'benefits' => ['Keyword Dominance', 'Technical SEO', 'On-Page Optimization', 'Quality Link Building']
        ],
        'smm' => [
            'name' => 'Social Media Marketing (SMM)',
            'desc' => 'Impactful social media management to skyrocket your brand visibility.',
            'benefits' => ['Viral Strategies', 'Audience Growth', 'Performance Tracking', 'Brand Consistency']
        ]
    ];

    public function home()
    {
        return view('welcome', ['services' => $this->services]);
    }

    public function service($slug)
    {
        if (!isset($this->services[$slug])) {
            abort(404);
        }

        $viewName = "pages.services.{$slug}";
        if (View::exists($viewName)) {
            return view($viewName, [
                'slug' => $slug,
                'service' => $this->services[$slug]
            ]);
        }

        return view('pages.service', [
            'slug' => $slug,
            'service' => $this->services[$slug]
        ]);
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function sitemap()
    {
        $urls = [
            url('/'),
            url('/contact'),
            route('terms'),
            route('privacy')
        ];
        foreach ($this->services as $slug => $data) {
            $urls[] = route('service', $slug);
        }

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        
        foreach ($urls as $url) {
            $xml .= '<url>';
            $xml .= '<loc>' . $url . '</loc>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>' . ($url == url('/') ? '1.0' : '0.8') . '</priority>';
            $xml .= '</url>';
        }
        
        $xml .= '</urlset>';

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
