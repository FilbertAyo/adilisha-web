<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Event;
use App\Models\Story;
use App\Models\Workshop;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    /**
     * Generate and return sitemap.xml
     */
    public function index(): Response
    {
        $xml = Cache::remember('sitemap', 3600, function () {
            return $this->generateSitemap();
        });

        return response($xml, 200)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Generate sitemap XML content
     */
    private function generateSitemap(): string
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        // Homepage
        $xml .= $this->addUrl(route('home'), now(), 'daily', '1.0');

        // Static pages
        $staticPages = [
            'about-us' => ['weekly', '0.9'],
            'our-team' => ['weekly', '0.8'],
            'agenda-2049' => ['monthly', '0.8'],
            'contact' => ['monthly', '0.7'],
            'partnership' => ['monthly', '0.7'],
            'donations' => ['monthly', '0.9'],
            'programs.chomoza' => ['monthly', '0.8'],
        ];

        foreach ($staticPages as $route => $config) {
            $xml .= $this->addUrl(route($route), now()->subDays(7), $config[0], $config[1]);
        }

        // Resource pages
        $resourcePages = [
            'resources.gallery' => ['weekly', '0.8'],
            'resources.events' => ['daily', '0.8'],
            'resources.reports' => ['weekly', '0.7'],
            'resources.carrier' => ['weekly', '0.6'],
            'resources.recruit' => ['weekly', '0.6'],
        ];

        foreach ($resourcePages as $route => $config) {
            $xml .= $this->addUrl(route($route), now()->subDays(3), $config[0], $config[1]);
        }

        // Blog pages
        $xml .= $this->addUrl(route('blog'), now(), 'daily', '0.9');
        
        $blogs = Blog::published()->get(['slug', 'updated_at']);
        foreach ($blogs as $blog) {
            $xml .= $this->addUrl(
                route('blog.show', $blog->slug),
                $blog->updated_at,
                'weekly',
                '0.8'
            );
        }

        // Workshop pages
        $xml .= $this->addUrl(route('workshops'), now(), 'weekly', '0.8');
        
        $workshops = Workshop::active()->get(['slug', 'updated_at']);
        foreach ($workshops as $workshop) {
            $xml .= $this->addUrl(
                route('workshops.show', $workshop->slug),
                $workshop->updated_at,
                'weekly',
                '0.7'
            );
        }

        // Stories pages
        $xml .= $this->addUrl(route('impact.stories'), now(), 'weekly', '0.8');
        
        $stories = Story::published()->get(['id', 'updated_at']);
        foreach ($stories as $story) {
            $xml .= $this->addUrl(
                route('impact.stories.show', $story->id),
                $story->updated_at,
                'monthly',
                '0.7'
            );
        }

        // Impact feedback
        $xml .= $this->addUrl(route('impact.feedback'), now(), 'monthly', '0.6');

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Add a URL entry to sitemap
     */
    private function addUrl(string $url, $lastmod, string $changefreq, string $priority): string
    {
        $xml = '<url>';
        $xml .= '<loc>' . htmlspecialchars($url) . '</loc>';
        $xml .= '<lastmod>' . ($lastmod instanceof \DateTime ? $lastmod->format('Y-m-d') : $lastmod) . '</lastmod>';
        $xml .= '<changefreq>' . $changefreq . '</changefreq>';
        $xml .= '<priority>' . $priority . '</priority>';
        $xml .= '</url>';

        return $xml;
    }
}
