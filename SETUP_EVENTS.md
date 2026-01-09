# Quick Setup Guide - Events System

## Step-by-Step Instructions

### 1. Run the Migration
Open your terminal and run:
```bash
cd /Users/ayo/Desktop/projects/adilisha
php artisan migrate
```

If you're in production mode and it asks for confirmation, type `yes` and press Enter.

### 2. (Optional) Add Sample Events
To populate your database with sample events for testing:
```bash
php artisan db:seed --class=EventSeeder
```

### 3. Access the Admin Panel
1. Log in to your admin dashboard
2. Navigate to **Resources → Events & Global Challenges**
3. Start creating your events!

### 4. View Events on Frontend
- **All Events Page**: Visit `/resources/events` on your website
- **Homepage**: The 3 latest upcoming events will appear on your homepage

## What's Been Created

✅ Database table for events  
✅ Admin panel for managing events (CRUD operations)  
✅ Frontend events display page  
✅ Homepage widget showing 3 latest events  
✅ Automatic status management (Open/Closed/Upcoming)  
✅ Image upload capability  
✅ Visibility toggle for events  
✅ Registration date management  

## Quick Test

After running the migration and seeder:
1. Visit: `http://your-domain/resources/events`
2. You should see sample events displayed
3. Log into admin panel and go to Events management
4. Try creating, editing, or deleting an event

## Need Help?

See the full documentation in `EVENTS_SYSTEM_README.md` for detailed information about all features and usage.

---

**Ready to use!** 🎉

