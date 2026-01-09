# 🚀 Production Deployment Checklist

Use this checklist when deploying your optimized website to production.

---

## Pre-Deployment

### 1. Environment Configuration

- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Set `CACHE_DRIVER=database` in `.env` (or `redis` if available)
- [ ] Update `APP_URL` to your actual domain
- [ ] Ensure `APP_KEY` is set (run `php artisan key:generate` if not)

### 2. Database

- [ ] Run migrations: `php artisan migrate --force`
- [ ] Seed data if needed: `php artisan db:seed --force`
- [ ] Backup your database

### 3. File Permissions

```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

---

## Optimization Commands

### Run These on Production Server

```bash
# 1. Clear everything first
php artisan website:clear-cache

# 2. Run migrations
php artisan migrate --force

# 3. Optimize for production
php artisan website:optimize
```

**What this does:**
- Clears all old caches
- Caches routes, views, config
- Optimizes composer autoloader

---

## Post-Deployment Testing

### 1. Test Core Functionality

- [ ] Homepage loads correctly
- [ ] Blog pages load correctly
- [ ] Events pages load correctly
- [ ] Gallery loads correctly
- [ ] Forms work (contact, feedback)
- [ ] Admin panel works

### 2. Test SEO Features

- [ ] Visit `/sitemap.xml` - should show XML sitemap
- [ ] Visit `/robots.txt` - should show robots file
- [ ] View source of homepage - check for meta tags:
  - [ ] `<meta property="og:title">`
  - [ ] `<meta property="og:description">`
  - [ ] `<meta property="og:image">`
  - [ ] `<script type="application/ld+json">` (structured data)

### 3. Test Performance

- [ ] Google PageSpeed Insights: https://pagespeed.web.dev/
  - Target: 85+ for mobile
  - Target: 90+ for desktop
  
- [ ] GTmetrix: https://gtmetrix.com/
  - Target: Grade A or B
  - Target: Load time < 2 seconds

### 4. Test Caching

```bash
# Check if caches exist
ls -la storage/framework/cache/
ls -la bootstrap/cache/

# Should see:
# - routes-v7.php
# - config.php
# - compiled views in framework/views/
```

### 5. Test Browser Caching

- [ ] Open browser DevTools (F12)
- [ ] Go to Network tab
- [ ] Load a page
- [ ] Look for cache headers on CSS/JS files
  - Should see: `Cache-Control: public, max-age=31536000`
- [ ] Reload page (Ctrl+R)
  - Static assets should show "(from cache)"

---

## Search Engine Setup

### Google Search Console

1. [ ] Go to https://search.google.com/search-console
2. [ ] Add your property (domain)
3. [ ] Verify ownership (HTML file or DNS)
4. [ ] Submit sitemap: `https://yourdomain.com/sitemap.xml`
5. [ ] Request indexing for homepage

### Bing Webmaster Tools

1. [ ] Go to https://www.bing.com/webmasters
2. [ ] Add your site
3. [ ] Submit sitemap: `https://yourdomain.com/sitemap.xml`

### Social Media

1. [ ] Test Open Graph tags:
   - Facebook: https://developers.facebook.com/tools/debug/
   - LinkedIn: https://www.linkedin.com/post-inspector/
   - Twitter: https://cards-dev.twitter.com/validator

2. [ ] Share a page on each platform
3. [ ] Verify preview looks good

---

## Security Checks

### Headers Check

Visit: https://securityheaders.com/

Your site should show:
- [ ] X-Frame-Options: SAMEORIGIN
- [ ] X-Content-Type-Options: nosniff
- [ ] X-XSS-Protection: 1; mode=block
- [ ] Referrer-Policy: strict-origin-when-cross-origin

### SSL Certificate

- [ ] Ensure HTTPS is enabled
- [ ] No mixed content warnings
- [ ] Green padlock in browser
- [ ] Certificate is valid and not expired

---

## Monitoring Setup

### 1. Error Monitoring

- [ ] Check `storage/logs/laravel.log` for errors
- [ ] Set up daily log review
- [ ] Consider: Laravel Telescope for debugging (dev only)

### 2. Uptime Monitoring

Consider using:
- UptimeRobot (Free)
- Pingdom
- StatusCake

### 3. Performance Monitoring

Consider using:
- Google Analytics
- Google Search Console
- Cloudflare Analytics (if using Cloudflare)

---

## Maintenance Schedule

### Daily
- [ ] Check error logs
- [ ] Monitor uptime

### Weekly
- [ ] Clear and re-optimize caches:
  ```bash
  php artisan website:clear-cache
  php artisan website:optimize
  ```

### Monthly
- [ ] Test page speed
- [ ] Review Google Search Console
- [ ] Update dependencies: `composer update`
- [ ] Clear old logs

### After Content Updates
- [ ] Run: `php artisan website:clear-cache`

---

## Rollback Plan

If something goes wrong:

```bash
# 1. Clear all caches
php artisan website:clear-cache

# 2. Clear specific caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

# 3. Rollback database (if needed)
php artisan migrate:rollback

# 4. Restore from backup
```

---

## Performance Benchmarks

Track these metrics:

| Metric | Target | Actual | Notes |
|--------|--------|--------|-------|
| Homepage Load Time | < 1.5s | _____ | |
| Blog Page Load Time | < 2s | _____ | |
| Google PageSpeed (Mobile) | 85+ | _____ | |
| Google PageSpeed (Desktop) | 90+ | _____ | |
| Database Queries (Homepage) | < 10 | _____ | |
| Time to First Byte (TTFB) | < 600ms | _____ | |

---

## Optional Enhancements

### For Even Better Performance

1. **Redis Cache** (20-40% faster)
   ```bash
   composer require predis/predis
   # Update .env: CACHE_DRIVER=redis
   ```

2. **CDN Integration** (50-70% faster globally)
   - CloudFlare (Free tier available)
   - AWS CloudFront
   - Update `.env`: `ASSET_URL=https://cdn.yourdomain.com`

3. **Database Optimization**
   ```bash
   # Optimize tables
   php artisan db:optimize
   
   # Analyze slow queries
   # Enable slow query log in MySQL
   ```

4. **OPcache** (PHP)
   ```ini
   # In php.ini
   opcache.enable=1
   opcache.memory_consumption=256
   opcache.max_accelerated_files=10000
   ```

---

## Troubleshooting Common Issues

### Issue: 500 Internal Server Error

```bash
php artisan config:clear
php artisan route:clear
php artisan cache:clear
chmod -R 755 storage
chmod -R 755 bootstrap/cache
```

### Issue: Changes Not Showing

```bash
php artisan website:clear-cache
```

### Issue: Slow Performance

```bash
# Re-optimize
php artisan website:optimize

# Check cache driver
php artisan config:show cache.default
```

### Issue: Sitemap Not Found

```bash
# Check routes
php artisan route:list | grep sitemap

# Clear route cache
php artisan route:clear
```

---

## Documentation References

- **Quick Start**: `README_OPTIMIZATION.md`
- **Command Reference**: `OPTIMIZATION_QUICKSTART.md`
- **Technical Details**: `OPTIMIZATION.md`
- **What Changed**: `IMPLEMENTATION_SUMMARY.md`

---

## Sign-Off Checklist

Before considering deployment complete:

- [ ] All pre-deployment tasks completed
- [ ] All optimization commands run successfully
- [ ] All post-deployment tests passed
- [ ] SEO features verified
- [ ] Performance benchmarks met
- [ ] Search engines notified
- [ ] Social media sharing tested
- [ ] Security headers verified
- [ ] Monitoring set up
- [ ] Team trained on maintenance commands

---

**Deployment Date:** _______________

**Deployed By:** _______________

**Verified By:** _______________

---

🎉 **Congratulations! Your optimized website is live!**

Remember to run `php artisan website:clear-cache` after content updates.

