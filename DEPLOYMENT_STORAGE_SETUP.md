# Storage Setup for cPanel/Shared Hosting

This guide helps you set up file storage for Laravel on cPanel/shared hosting without symlinks.

## ✅ What Was Changed

The `config/filesystems.php` has been updated to use `base_path('../public_html/storage')` instead of `storage_path('app/public')`. This ensures files are stored directly in `public_html/storage` (the public web root) instead of using symlinks.

**Why?** Since your Laravel app runs from `adilisha-web/` (private) but files must be in `public_html/` (public), we use a path that goes up one level from the Laravel root and into `public_html/storage`.

## 🚀 Server Setup Steps

### 1. Create Storage Directory in public_html

SSH into your server and run:

```bash
cd public_html
mkdir -p storage
```

Or via cPanel File Manager:
- Navigate to `public_html`
- Create a new folder named `storage`

### 2. Copy Existing Files (if any)

If you have existing files in the old storage location, copy them:

```bash
# From your home directory (where adilisha-web and public_html are siblings)
cd ~
cp -R adilisha-web/storage/app/public/* public_html/storage/
```

Or from within the Laravel directory:

```bash
cd adilisha-web
cp -R storage/app/public/* ../public_html/storage/
```

### 3. Set Correct Permissions

```bash
chmod -R 755 public_html/storage
```

Or via cPanel File Manager:
- Right-click on `storage` folder
- Select "Change Permissions"
- Set to `755`

### 4. Clear Laravel Config Cache

This is **IMPORTANT** - you must clear the config cache after deployment:

```bash
cd adilisha-web
/usr/local/bin/ea-php82 artisan config:clear
```

Or if your PHP version is different, use:
```bash
cd adilisha-web
php artisan config:clear
```

**Note:** Make sure you run this command from within the `adilisha-web` directory where your Laravel application is located.

### 5. Verify Upload Code

All file uploads in your application are already using the correct syntax:
```php
$file->store('images', 'public');
```

This will now store files in: `public_html/storage/images/filename.jpg`

And they'll be accessible at: `https://adilisha.or.tz/storage/images/filename.jpg`

## 📁 Directory Structure

After setup, your structure should look like:

```
~ (home directory)
├── adilisha-web/        ← Laravel app (private, not web-accessible)
│   ├── app/
│   ├── config/
│   ├── storage/         ← Private storage (logs, cache, etc.)
│   └── ...
└── public_html/         ← Public web root (web-accessible)
    ├── storage/         ← Public file storage (NEW - files stored here)
    │   ├── images/
    │   ├── workshops/
    │   ├── stories/
    │   └── team/
    ├── index.php
    └── ...
```

**Key Point:** Files uploaded via Laravel (running from `adilisha-web/`) will be stored in `public_html/storage/` so they're accessible via the web.

## ✅ Benefits

- ✅ No symlinks required
- ✅ Works reliably on cPanel/shared hosting
- ✅ Files are directly accessible via web
- ✅ No manual file copying needed after setup

## 🔍 Verification

After deployment, test by:
1. Uploading a file through your application
2. Checking that it appears in `public_html/storage/`
3. Verifying it's accessible via browser at `https://adilisha.or.tz/storage/path/to/file.jpg`

## ⚠️ Important Notes

- Make sure `public_html/storage` folder exists before deploying
- Clear config cache after deployment from `adilisha-web/` directory: `php artisan config:clear`
- If files don't appear, check folder permissions (should be 755)
- The `.gitignore` file already ignores `storage` folder, so uploaded files won't be committed to git
- **Path Configuration:** The config uses `base_path('../public_html/storage')` which assumes `adilisha-web` and `public_html` are sibling directories. If your structure is different, you can set `PUBLIC_STORAGE_PATH` in your `.env` file with the absolute path to `public_html/storage`
