# Storage Setup for cPanel/Shared Hosting

This guide helps you set up file storage for Laravel on cPanel/shared hosting without symlinks.

## ✅ What Was Changed

The `config/filesystems.php` has been updated to use `public_path('storage')` instead of `storage_path('app/public')`. This means files will be stored directly in `public_html/storage` instead of using symlinks.

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
# From your Laravel root directory (e.g., adilisha-web/)
cp -R storage/app/public/* public_html/storage/
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
/usr/local/bin/ea-php82 artisan config:clear
```

Or if your PHP version is different, use:
```bash
php artisan config:clear
```

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
public_html/
├── storage/              ← Files stored here (NEW)
│   ├── images/
│   ├── workshops/
│   ├── stories/
│   └── team/
├── index.php
└── ...
```

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
- Clear config cache after deployment: `php artisan config:clear`
- If files don't appear, check folder permissions (should be 755)
- The `.gitignore` file already ignores `storage` folder, so uploaded files won't be committed to git
