<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

class RobotsController extends Controller
{
    /**
     * Generate and return robots.txt
     */
    public function index(): Response
    {
        $robots = "User-agent: *\n";
        $robots .= "Allow: /\n\n";
        
        // Disallow admin areas
        $robots .= "Disallow: /admin/\n";
        $robots .= "Disallow: /dashboard/\n";
        $robots .= "Disallow: /profile/\n";
        $robots .= "Disallow: /login/\n";
        $robots .= "Disallow: /register/\n";
        $robots .= "Disallow: /password/\n\n";
        
        // Add sitemap reference
        $robots .= "Sitemap: " . route('sitemap') . "\n";

        return response($robots, 200)
            ->header('Content-Type', 'text/plain');
    }
}
