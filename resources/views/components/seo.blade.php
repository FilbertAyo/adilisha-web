@props(['meta' => []])

@php
    $seoData = \App\Services\SeoService::generateMeta($meta);
@endphp

{{-- Primary Meta Tags --}}
<title>{{ $seoData['title'] }}</title>
<meta name="title" content="{{ $seoData['title'] }}">
<meta name="description" content="{{ $seoData['description'] }}">
<meta name="keywords" content="{{ $seoData['keywords'] }}">

{{-- Open Graph / Facebook --}}
<meta property="og:type" content="{{ $seoData['type'] }}">
<meta property="og:url" content="{{ $seoData['url'] }}">
<meta property="og:title" content="{{ $seoData['title'] }}">
<meta property="og:description" content="{{ $seoData['description'] }}">
<meta property="og:image" content="{{ $seoData['image'] }}">
<meta property="og:site_name" content="{{ $seoData['site_name'] }}">
<meta property="og:locale" content="{{ $seoData['locale'] }}">

{{-- Twitter --}}
<meta property="twitter:card" content="{{ $seoData['twitter_card'] }}">
<meta property="twitter:url" content="{{ $seoData['url'] }}">
<meta property="twitter:title" content="{{ $seoData['title'] }}">
<meta property="twitter:description" content="{{ $seoData['description'] }}">
<meta property="twitter:image" content="{{ $seoData['image'] }}">

{{-- Canonical URL --}}
<link rel="canonical" href="{{ $seoData['url'] }}">

