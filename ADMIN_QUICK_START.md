# Admin Dashboard - Quick Start Guide

## Getting Started in 3 Steps

### Step 1: Create Admin User
```bash
php artisan make:admin admin@example.com --create
# Enter admin name: Admin User
# Enter password: YourSecurePassword
```

### Step 2: Login to Admin Dashboard
1. Go to: `http://localhost:8000/login`
2. Email: `admin@example.com`
3. Password: `YourSecurePassword`
4. After login, navigate to: `http://localhost:8000/admin/dashboard`

### Step 3: Start Managing Content

## Admin Dashboard Features

### 📊 Dashboard
View statistics at a glance:
- Total Books
- Total Categories
- Total Users
- Total Admins

### 📚 Books Management
- ➕ Create new books with cover images
- ✏️ Edit book details and pricing
- 🗑️ Delete books
- 📸 Upload and manage book covers

### 📑 Categories
- ➕ Create book categories
- ✏️ Edit category names and descriptions
- 🗑️ Remove categories

### 👥 Users Management
- ➕ Create new users
- ✏️ Edit user information
- 🔑 Assign/Remove admin roles
- 🗑️ Delete users

### 🎯 Team Members
- ➕ Add team member profiles with photos
- ✏️ Edit member information
- 📸 Update member images
- 🗑️ Remove team members

### ⭐ Testimonials
- ➕ Add customer testimonials with star ratings
- ✏️ Edit testimonials
- 🗑️ Remove testimonials
- ⭐ Rate testimonials (1-5 stars)

### ❓ FAQs
- ➕ Create FAQ entries
- ✏️ Edit questions and answers
- 🗑️ Delete FAQs

## Keyboard Shortcuts

- **ESC** - Cancel form and go back
- **ENTER** - Submit form
- **DEL** - Delete with confirmation

## File Upload Guidelines

### Book Cover Images
- Formats: JPEG, PNG, JPG, GIF
- Max Size: 2MB
- Recommended: 300x400px

### Team Member Photos
- Formats: JPEG, PNG, JPG, GIF
- Max Size: 2MB
- Recommended: 200x200px (square)

## Common Tasks

### How to Add a New Book
1. Click "Books" in sidebar
2. Click "Add Book" button
3. Fill in title, author, price, description
4. Upload cover image (optional)
5. Click "Create Book"

### How to Create a User Account
1. Click "Users" in sidebar
2. Click "Add User" button
3. Enter name, email, password
4. Check "Make this user an admin" if needed
5. Click "Create User"

### How to Make Someone an Admin
1. Go to Users page
2. Find the user
3. Click "Edit"
4. Check "Make this user an admin"
5. Click "Update User"

## Tips & Tricks

- ✅ Use clear, descriptive titles for better organization
- ✅ Add detailed descriptions for better SEO
- ✅ Keep file sizes small for faster uploads
- ✅ Regularly backup your database
- ⚠️ Be careful when deleting - changes cannot be undone
- ⚠️ Always confirm before deleting important data

## Troubleshooting

### Image Upload Not Working
- Check storage link: `php artisan storage:link`
- Verify permissions: Storage folder writable
- Check file size: Must be under 2MB

### Can't Access Admin Panel
- Verify you're logged in
- Check if your account is admin: Edit your user profile
- Clear browser cache and try again

### Database Issues
- Run migrations: `php artisan migrate`
- Reset database: `php artisan migrate:refresh`
- Check .env file for database credentials

## Need Help?

- Check ADMIN_DASHBOARD.md for detailed documentation
- Review form validation errors
- Check Laravel logs: `storage/logs/laravel.log`

## Dashboard Customization

The admin dashboard can be customized by editing:
- `resources/views/admin/layout.blade.php` - Main layout and styling
- `resources/views/admin/dashboard.blade.php` - Dashboard home
- `bootstrap/app.php` - Middleware configuration

## Security Reminders

✅ Change default admin password immediately
✅ Don't share admin credentials
✅ Regularly update user permissions
✅ Keep backups of important data
✅ Monitor user activity

## Version Info

- Laravel: 11.x
- Bootstrap: 5.3
- Font Awesome: 6.4
- PHP: 8.2+
