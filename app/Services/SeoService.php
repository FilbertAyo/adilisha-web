<?php

namespace App\Services;

class SeoService
{
    /**
     * Generate SEO meta tags for a page
     */
    public static function generateMeta(array $data = []): array
    {
        $defaults = [
            'title' => config('app.name') . ' - Empowering Youth Through STEM Education',
            'description' => 'Adilisha Youth and Child Development Organization is a Tanzania-based NGO empowering children—especially girls—to succeed in STEM education and leadership.',
            'keywords' => 'STEM education, Tanzania NGO, youth empowerment, girls in STEM, VUTAMDOGO, CHOMOZA, technology education, child development',
            'image' => asset('front-end/images/logo/favicon.svg'),
            'url' => url()->current(),
            'type' => 'website',
            'site_name' => config('app.name'),
            'locale' => 'en_US',
            'twitter_card' => 'summary_large_image',
        ];

        $meta = array_merge($defaults, $data);

        // Ensure full URL for image
        if (!filter_var($meta['image'], FILTER_VALIDATE_URL)) {
            $meta['image'] = asset($meta['image']);
        }

        return $meta;
    }

    /**
     * Generate structured data (JSON-LD) for organization
     */
    public static function getOrganizationSchema(): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'NGO',
            'name' => config('app.name'),
            'alternateName' => 'Adilisha',
            'url' => config('app.url'),
            'logo' => asset('front-end/images/logo/favicon.svg'),
            'description' => 'A Tanzania-based NGO empowering children—especially girls—to succeed in STEM education and leadership.',
            'address' => [
                '@type' => 'PostalAddress',
                'addressCountry' => 'TZ',
                'addressLocality' => 'Tanzania',
            ],
            'sameAs' => [
                // Add social media links here
                // 'https://facebook.com/adilisha',
                // 'https://twitter.com/adilisha',
                // 'https://linkedin.com/company/adilisha',
            ],
        ];
    }

    /**
     * Generate structured data for an article/blog
     */
    public static function getArticleSchema($blog): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Article',
            'headline' => $blog->title,
            'description' => $blog->excerpt ?? strip_tags(substr($blog->content, 0, 160)),
            'image' => $blog->featured_image ? asset('storage/' . $blog->featured_image) : asset('front-end/images/logo/favicon.svg'),
            'author' => [
                '@type' => 'Person',
                'name' => $blog->author_name,
            ],
            'publisher' => [
                '@type' => 'Organization',
                'name' => config('app.name'),
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('front-end/images/logo/favicon.svg'),
                ],
            ],
            'datePublished' => $blog->published_at?->toIso8601String(),
            'dateModified' => $blog->updated_at->toIso8601String(),
        ];
    }

    /**
     * Generate structured data for an event
     */
    public static function getEventSchema($event): array
    {
        return [
            '@context' => 'https://schema.org',
            '@type' => 'Event',
            'name' => $event->title,
            'description' => $event->description ?? '',
            'startDate' => $event->event_date?->toIso8601String(),
            'endDate' => $event->end_date?->toIso8601String(),
            'eventStatus' => 'https://schema.org/EventScheduled',
            'eventAttendanceMode' => $event->is_online ? 'https://schema.org/OnlineEventAttendanceMode' : 'https://schema.org/OfflineEventAttendanceMode',
            'location' => [
                '@type' => $event->is_online ? 'VirtualLocation' : 'Place',
                'name' => $event->location ?? 'Tanzania',
            ],
            'image' => $event->image ? asset('storage/' . $event->image) : asset('front-end/images/logo/favicon.svg'),
            'organizer' => [
                '@type' => 'Organization',
                'name' => config('app.name'),
                'url' => config('app.url'),
            ],
        ];
    }

    /**
     * Generate breadcrumb structured data
     */
    public static function getBreadcrumbSchema(array $items): array
    {
        $listItems = [];
        
        foreach ($items as $index => $item) {
            $listItems[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['name'],
                'item' => $item['url'] ?? null,
            ];
        }

        return [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $listItems,
        ];
    }
}

