# Website Optimization Guide

This document outlines all the performance and SEO optimizations implemented in the Adilisha website.

## 🚀 Performance Optimizations

### 1. Database Query Optimization & Caching

#### Homepage Caching
- Gallery images cached for 30 minutes
- Recent blogs cached for 30 minutes  
- Events cached for 30 minutes
- Stories cached for 30 minutes

**Cache Keys:**
- `home.galleries` - Featured gallery images
- `home.blogs` - Recent blog posts
- `home.events` - Upcoming events
- `home.stories` - Success stories
- `footer.recent_blogs` - Footer blog links

#### Query Optimization
- Eager loading relationships with `with()` to prevent N+1 queries
- Strategic use of `select()` to fetch only needed columns
- Pagination for large datasets

### 2. View & Route Caching

Use these commands for production optimization:

```bash
# Optimize for production (recommended)
php artisan website:optimize

# This runs:
# - config:cache
# - route:cache
# - view:cache
# - composer dump-autoload -o
```

### 3. Browser Caching

Browser caching headers configured in `.htaccess`:
- **CSS/JS**: 1 year
- **Images**: 1 month
- **Fonts**: 1 month
- **HTML**: No cache (always fresh)

### 4. Compression

Gzip compression enabled for:
- HTML, CSS, JavaScript
- JSON, XML
- SVG images
- Web fonts

### 5. Asset Optimization

- **Lazy Loading**: Images use `loading="lazy"` attribute
- **CDN Ready**: All assets use `asset()` helper for easy CDN integration

### 6. Middleware Optimization

`OptimizeMiddleware` adds:
- Cache control headers for static assets
- Security headers (X-Frame-Options, X-Content-Type-Options, X-XSS-Protection)
- Compression headers

---

## 🔍 SEO Optimizations

### 1. Meta Tags & Open Graph

Every page includes:
- Title tag (optimized for search engines)
- Meta description
- Meta keywords
- Open Graph tags (Facebook, LinkedIn)
- Twitter Card tags
- Canonical URLs

**Usage in Blade templates:**

```blade
<x-seo :meta="[
    'title' => 'Page Title - Adilisha',
    'description' => 'Page description here...',
    'image' => 'path/to/image.jpg',
    'type' => 'article'
]" />
```

### 2. Structured Data (Schema.org)

Implemented JSON-LD structured data for:
- **Organization**: NGO information
- **Articles**: Blog posts with author info
- **Events**: Workshop and event details
- **Breadcrumbs**: Navigation structure

**Usage in Blade templates:**

```blade
<x-structured-data :schema="\App\Services\SeoService::getArticleSchema($blog)" />
```

### 3. Sitemap Generation

Dynamic sitemap at `/sitemap.xml` includes:
- All static pages
- Published blog posts
- Active workshops
- Published stories
- Events and galleries

**Update frequency:**
- Homepage: Daily
- Blogs: Weekly
- Static pages: Monthly

### 4. Robots.txt

Dynamic `robots.txt` at `/robots.txt`:
- Allows all search engines
- Disallows admin/dashboard areas
- References sitemap location

### 5. URL Optimization

- Clean URLs (no trailing slashes)
- Descriptive slugs for content
- Canonical URLs to prevent duplicate content

---

## 📊 Cache Management

### Clear All Caches

```bash
php artisan website:clear-cache
```

This command clears:
- Application cache
- Configuration cache
- Route cache
- View cache
- Compiled classes

### Clear Specific Caches

```bash
# Clear application cache only
php artisan cache:clear

# Clear specific cache keys
Cache::forget('home.galleries');
Cache::forget('footer.recent_blogs');
```

### When to Clear Cache

Clear caches when you:
- Update blog posts or content
- Modify gallery images
- Change events or stories
- Update configuration
- Deploy new code

### Cache Tags by Feature

| Feature | Cache Key | TTL | Clear When |
|---------|-----------|-----|------------|
| Homepage Galleries | `home.galleries` | 30 min | New gallery added |
| Homepage Blogs | `home.blogs` | 30 min | New blog published |
| Homepage Events | `home.events` | 30 min | Event created/updated |
| Homepage Stories | `home.stories` | 30 min | Story published |
| Footer Blogs | `footer.recent_blogs` | 1 hour | Blog published |
| Blog Sidebar | `blog.recent_sidebar` | 30 min | Blog published |
| Sitemap | `sitemap` | 1 hour | Content updated |

---

## 🛠 Development vs Production

### Development Mode

```bash
# .env settings
APP_ENV=local
APP_DEBUG=true
CACHE_DRIVER=file

# Don't cache in development
php artisan website:clear-cache
```

### Production Mode

```bash
# .env settings
APP_ENV=production
APP_DEBUG=false
CACHE_DRIVER=database  # or redis for better performance

# Optimize for production
php artisan website:optimize
```

---

## ⚡ Additional Performance Tips

### 1. PHP Configuration

Enable OPcache in `php.ini`:
```ini
opcache.enable=1
opcache.memory_consumption=256
opcache.interned_strings_buffer=16
opcache.max_accelerated_files=10000
opcache.revalidate_freq=2
```

### 2. Web Server Configuration

#### Apache
- Ensure `mod_deflate` and `mod_expires` are enabled
- `.htaccess` is already configured

#### Nginx (if migrating)
```nginx
# Gzip compression
gzip on;
gzip_vary on;
gzip_types text/plain text/css text/xml text/javascript application/javascript application/xml+rss;

# Browser caching
location ~* \.(jpg|jpeg|png|gif|ico|css|js|woff|woff2)$ {
    expires 1y;
    add_header Cache-Control "public, immutable";
}
```

### 3. Database Optimization

```bash
# Optimize database tables
php artisan db:optimize

# Use database indexes (already in migrations)
# Ensure foreign keys are indexed
```

### 4. Redis Cache (Optional)

For better performance, use Redis:

```bash
# Install Redis
composer require predis/predis

# .env
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

### 5. CDN Integration

Update `.env` for CDN:
```bash
ASSET_URL=https://cdn.yourdomain.com
AWS_URL=https://s3.amazonaws.com/your-bucket
```

---

## 🧪 Testing Performance

### 1. Google PageSpeed Insights
Visit: https://pagespeed.web.dev/
Test your live website

### 2. GTmetrix
Visit: https://gtmetrix.com/
Analyze load time and optimization score

### 3. Local Testing
```bash
# Install Laravel Telescope (for query monitoring)
composer require laravel/telescope --dev
php artisan telescope:install
php artisan migrate
```

---

## 📈 Monitoring

### Check Cache Hit Rate

```php
// Add to dashboard
$cacheHits = Cache::get('cache_hits', 0);
$cacheMisses = Cache::get('cache_misses', 0);
$hitRate = $cacheHits / ($cacheHits + $cacheMisses) * 100;
```

### Monitor Query Performance

```bash
# Enable query logging temporarily
DB::enableQueryLog();
// ... your code ...
dd(DB::getQueryLog());
```

---

## 🔄 Maintenance Schedule

### Daily
- Monitor cache hit rates
- Check error logs

### Weekly  
- Clear old cache entries
- Review slow query logs
- Test sitemap generation

### Monthly
- Run full optimization: `php artisan website:optimize`
- Review and update SEO meta tags
- Analyze Google Search Console data

### After Deployments
```bash
# Standard deployment optimization
php artisan website:clear-cache
php artisan migrate --force
php artisan website:optimize
```

---

## 📞 Support

For questions or issues:
1. Check Laravel logs: `storage/logs/laravel.log`
2. Clear caches: `php artisan website:clear-cache`
3. Re-optimize: `php artisan website:optimize`

---

## 🎯 Optimization Checklist

- [x] Database query caching
- [x] View caching  
- [x] Route caching
- [x] Config caching
- [x] Browser caching headers
- [x] Gzip compression
- [x] Image lazy loading
- [x] SEO meta tags
- [x] Open Graph tags
- [x] Structured data (JSON-LD)
- [x] Dynamic sitemap
- [x] Dynamic robots.txt
- [x] Security headers
- [x] Optimization commands
- [ ] CDN integration (optional)
- [ ] Redis caching (optional)
- [ ] Image optimization/WebP (optional)

---

**Last Updated:** January 2026
**Version:** 1.0

