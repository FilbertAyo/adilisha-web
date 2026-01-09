# 🚀 Quick Optimization Guide

## For Production Deployment

Run this single command to optimize your website:

```bash
php artisan website:optimize
```

This will:
- ✅ Clear all existing caches
- ✅ Cache configuration files
- ✅ Cache routes for faster routing
- ✅ Cache views for faster rendering
- ✅ Optimize composer autoloader

---

## When Content Changes

After updating blogs, events, galleries, or other content:

```bash
php artisan website:clear-cache
```

Then re-optimize:

```bash
php artisan website:optimize
```

---

## Important Files Modified

### SEO & Performance
- ✅ **SEO Meta Tags**: Added to all pages via `<x-seo>` component
- ✅ **Structured Data**: JSON-LD schema for better search results
- ✅ **Sitemap**: Available at `/sitemap.xml`
- ✅ **Robots.txt**: Available at `/robots.txt`

### Caching
- ✅ **Homepage**: All data cached for 30 minutes
- ✅ **Blogs**: Sidebar cached for 30 minutes
- ✅ **Footer**: Recent blogs cached for 1 hour

### Performance
- ✅ **Compression**: Gzip enabled in `.htaccess`
- ✅ **Browser Caching**: 1 year for CSS/JS, 1 month for images
- ✅ **Lazy Loading**: Images load as user scrolls
- ✅ **Security Headers**: XSS protection, frame options, etc.

---

## Quick Checks

### 1. Test Your Sitemap
Visit: `https://yourdomain.com/sitemap.xml`

### 2. Test Your Robots.txt
Visit: `https://yourdomain.com/robots.txt`

### 3. Check Page Speed
Visit: https://pagespeed.web.dev/
Enter your website URL

---

## Environment Variables

Make sure your `.env` has:

```bash
# For production
APP_ENV=production
APP_DEBUG=false
CACHE_DRIVER=database

# Optional: Use Redis for better caching
# CACHE_DRIVER=redis
# SESSION_DRIVER=redis
```

---

## Cache Keys Reference

| What | Cache Key | Duration |
|------|-----------|----------|
| Homepage galleries | `home.galleries` | 30 min |
| Homepage blogs | `home.blogs` | 30 min |
| Homepage events | `home.events` | 30 min |
| Homepage stories | `home.stories` | 30 min |
| Footer blogs | `footer.recent_blogs` | 60 min |
| Blog sidebar | `blog.recent_sidebar` | 30 min |
| Sitemap | `sitemap` | 60 min |

To clear a specific cache:
```php
Cache::forget('home.galleries');
```

---

## Troubleshooting

### Site not loading after optimization?
```bash
php artisan website:clear-cache
```

### Changes not showing up?
```bash
php artisan website:clear-cache
php artisan website:optimize
```

### 500 Error after caching?
```bash
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## Google Search Console Setup

1. Visit: https://search.google.com/search-console
2. Add your property
3. Verify ownership
4. Submit sitemap: `https://yourdomain.com/sitemap.xml`

---

## Maintenance Commands

```bash
# Clear everything
php artisan website:clear-cache

# Optimize everything  
php artisan website:optimize

# Clear specific caches
php artisan cache:clear       # Application cache
php artisan config:clear      # Config cache
php artisan route:clear       # Route cache
php artisan view:clear        # View cache
```

---

**Need more details?** See `OPTIMIZATION.md` for the complete guide.

