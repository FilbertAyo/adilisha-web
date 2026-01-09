# Workshop System Setup Guide

## ✅ System Successfully Implemented!

The complete workshop management system has been implemented with the following features:

## Features Implemented

### Admin Panel (`/admin/workshops`)
1. **Workshop CRUD Operations**
   - Create, Read, Update, Delete workshops
   - Rich form with all workshop details
   - Upload main workshop image
   - Set workshop status (upcoming, ongoing, completed, cancelled)
   - Add tags for categorization

2. **Workshop Gallery Management**
   - Upload multiple images per workshop
   - Add captions to gallery images
   - Delete gallery images
   - Images displayed in "What We Learned" section

3. **Testimonials Management**
   - Add student/teacher testimonials
   - Upload testimonial photos
   - Include name, role, school, and testimonial text
   - Toggle active/inactive status

4. **Beneficiaries Management**
   - Add workshop beneficiaries
   - Upload beneficiary photos
   - Add future aspirations
   - Display in grid format on workshop detail page

5. **Workshop Details**
   - Workshop title and slug
   - Date, time, and location
   - Overview and "What We Learned" sections
   - Participation statistics:
     - Total participants
     - Girls participation (with percentage calculation)
     - Attendance rate
     - Schools represented
   - Tags for categorization
   - Active/inactive toggle

### Frontend Display (`/workshops`)

1. **Workshop Index Page**
   - Grid display of all active workshops
   - Filter by status (All, Upcoming, Completed)
   - Search functionality
   - Workshop cards showing:
     - Main image
     - Title and date
     - Location and time
     - Participant statistics
     - Tags
     - Status badges
   - Pagination support

2. **Workshop Detail Page** (`/workshops/{slug}`)
   - Full workshop information
   - Main workshop image
   - Overview and learnings
   - Gallery section (2-column grid)
   - Participation & Attendance statistics
   - Testimonials with photos
   - Beneficiaries gallery
   - Tags
   - Sidebar with:
     - Workshop information summary
     - Recent workshops
     - Search functionality

## Database Tables Created

1. `workshops` - Main workshop data
2. `workshop_galleries` - Gallery images
3. `workshop_testimonials` - Student/teacher testimonials
4. `workshop_beneficiaries` - Workshop beneficiaries
5. `workshop_tags` - Tags for categorization
6. `workshop_tag_pivot` - Many-to-many relationship

## How to Use

### Step 1: Access Admin Panel
Navigate to: `http://127.0.0.1:8000/admin/workshops`

### Step 2: Create Your First Workshop

1. Click **"Create New Workshop"** button
2. Fill in the basic information:
   - **Title**: e.g., "Advanced STEM Workshop for Girls"
   - **Date**: Workshop date
   - **Time**: Start and end time
   - **Location**: e.g., "Office HQ" or "Bunda District"
   - **Overview**: Brief description of the workshop
   - **Main Image**: Upload the main workshop image (max 5MB)

3. Add participation details:
   - Total participants
   - Girls participation count
   - Attendance rate
   - Schools represented

4. Set status and tags:
   - Status: Upcoming/Ongoing/Completed/Cancelled
   - Select relevant tags (STEM, Robotics, Coding, etc.)
   - Check "Active" to display on website

5. Click **"Create Workshop"**

### Step 3: Add Gallery Images

1. After creating the workshop, you'll be on the edit page
2. Scroll to **"Gallery Images"** section
3. Click **"Add Images"** button
4. Select multiple images (photos from the workshop)
5. Upload and add optional captions
6. These will appear in the "What We Learned" section

### Step 4: Add Testimonials

1. In the **"Testimonials"** section, click **"Add Testimonial"**
2. Fill in:
   - **Name**: Student or teacher name
   - **Role**: "Student", "Teacher", etc.
   - **School**: School name (optional)
   - **Testimonial**: Their feedback quote
   - **Photo**: Upload their photo (optional)
3. Testimonials will display with photos on the workshop detail page

### Step 5: Add Beneficiaries

1. In the **"Beneficiaries"** section, click **"Add Beneficiary"**
2. Fill in:
   - **Name**: Beneficiary name
   - **Future Aspiration**: e.g., "Future Engineer"
   - **Photo**: Upload their photo
3. They'll appear in a grid on the workshop detail page

### Step 6: View on Website

Navigate to: `http://127.0.0.1:8000/workshops`

You'll see your workshop displayed with:
- Main image
- All details
- Links to full workshop page

Click **"View Details"** to see the complete workshop page with all galleries, testimonials, and beneficiaries!

## Available Workshop Tags

The following tags have been pre-created:
- STEM
- Robotics
- Coding
- Science
- Mathematics
- Engineering
- Technology
- Girls in STEM
- Education
- Programming

## File Upload Guidelines

### Main Workshop Image
- **Recommended size**: 1200x800px
- **Max file size**: 5MB
- **Formats**: JPEG, PNG, JPG, GIF

### Gallery Images
- **Recommended size**: 800x600px
- **Max file size**: 5MB per image
- **Formats**: JPEG, PNG, JPG, GIF
- Can upload multiple images at once

### Testimonial Photos
- **Recommended size**: 400x400px (square)
- **Max file size**: 2MB
- **Formats**: JPEG, PNG, JPG, GIF

### Beneficiary Photos
- **Recommended size**: 400x400px (square)
- **Max file size**: 2MB
- **Formats**: JPEG, PNG, JPG, GIF

## Routes

### Frontend
- `/workshops` - Workshop index page
- `/workshops/{slug}` - Workshop detail page

### Admin
- `/admin/workshops` - Workshop management dashboard
- `/admin/workshops/create` - Create new workshop
- `/admin/workshops/{id}/edit` - Edit workshop

## Tips for Best Results

1. **Use High-Quality Images**: Clear, well-lit photos work best
2. **Write Compelling Descriptions**: Engage readers with detailed overviews
3. **Collect Testimonials**: Real feedback adds authenticity
4. **Update Regularly**: Keep workshop statuses current
5. **Use Tags Effectively**: Helps users find relevant workshops
6. **Track Statistics**: Record participation data for impact reporting

## Troubleshooting

### Images Not Showing?
- Ensure images are uploaded to `storage/app/public/`
- Run: `php artisan storage:link` if storage link is broken
- Check file permissions on storage directory

### Workshop Not Visible on Frontend?
- Ensure "Active" checkbox is checked
- Verify workshop status is appropriate
- Check that workshop has a valid slug

### Gallery/Testimonials Not Saving?
- Check file sizes (max 5MB for galleries, 2MB for testimonials)
- Ensure file formats are supported (JPEG, PNG, JPG, GIF)
- Check browser console for JavaScript errors

## Summary

The workshop system is now fully functional! You can:
✅ Create and manage workshops from admin panel
✅ Upload images for workshops, galleries, testimonials, and beneficiaries
✅ Track participation statistics
✅ Display everything beautifully on the frontend
✅ Filter and search workshops
✅ View detailed workshop information with all media

Navigate to `/admin/workshops` to get started!

