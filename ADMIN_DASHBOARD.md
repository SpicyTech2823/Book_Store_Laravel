# Admin Dashboard - Book Store

## Overview
A fully functional admin dashboard with complete CRUD operations for managing:
- Books
- Categories
- Users & Admin Management
- Team Members
- Testimonials
- FAQs

## Features

### Security
- Admin middleware authentication
- Role-based access control
- Admin-only protected routes
- User verification on delete operations

### Dashboard
- Real-time statistics (total books, categories, users, admins)
- Quick action buttons for creating new items
- Responsive design with Bootstrap 5
- Professional UI with Font Awesome icons

### CRUD Operations

#### Books Management
- **Create**: Add new books with title, author, price, description, and cover image
- **Read**: View all books in a table format
- **Update**: Edit book details and cover image
- **Delete**: Remove books from the system
- Image upload support with storage integration

#### Categories Management
- **Create**: Add book categories with name, icon, and description
- **Read**: View all categories
- **Update**: Edit category details
- **Delete**: Remove categories

#### Users Management
- **Create**: Add new users with admin role assignment
- **Read**: View all users with role badges
- **Update**: Edit user details and promote/demote admin status
- **Delete**: Remove users (cannot delete own account)
- Password management with confirmation

#### Team Members Management
- **Create**: Add team members with image uploads
- **Read**: Display team members with images
- **Update**: Edit member details and photo
- **Delete**: Remove team members

#### Testimonials Management
- **Create**: Add customer testimonials with star ratings (1-5)
- **Read**: View all testimonials with ratings
- **Update**: Edit testimonial content and rating
- **Delete**: Remove testimonials

#### FAQs Management
- **Create**: Add FAQ entries with questions and answers
- **Read**: Display all FAQs
- **Update**: Edit FAQ content
- **Delete**: Remove FAQs

## Setup Instructions

### 1. Create Admin User

Run the command to create a new admin user:

```bash
php artisan make:admin admin@example.com --create
```

Or make an existing user an admin:

```bash
php artisan make:admin existing@user.com
```

### 2. Run Migrations

```bash
php artisan migrate
```

### 3. Set Up Storage Link (for image uploads)

```bash
php artisan storage:link
```

### 4. Access Admin Dashboard

- **URL**: `http://localhost:8000/admin/dashboard`
- **Login**: Use your admin credentials
- **Email**: admin@example.com
- **Password**: password123 (set during user creation)

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   └── AdminController.php (All CRUD logic)
│   └── Middleware/
│       └── IsAdmin.php (Admin verification)
├── Models/
│   ├── User.php (with is_admin field)
│   ├── Book.php
│   ├── Category.php
│   ├── TeamMember.php
│   ├── Testimonial.php
│   └── FAQ.php
├── Console/
│   └── Commands/
│       └── MakeAdmin.php (Admin creation command)

database/
├── migrations/
│   └── 2026_05_20_add_admin_to_users_table.php

resources/views/admin/
├── layout.blade.php (Main layout)
├── dashboard.blade.php (Dashboard home)
├── books/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── categories/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── users/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── team-members/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
├── testimonials/
│   ├── index.blade.php
│   ├── create.blade.php
│   └── edit.blade.php
└── faqs/
    ├── index.blade.php
    ├── create.blade.php
    └── edit.blade.php

routes/web.php (Admin routes)
bootstrap/app.php (Middleware registration)
```

## Navigation

The admin dashboard sidebar includes:
- Dashboard (Home)
- Books Management
- Categories Management
- Users Management
- Team Members Management
- Testimonials Management
- FAQs Management
- Back to Store Link
- Logout

## User Interface

### Sidebar
- Dark theme with hover effects
- Active route highlighting
- Quick navigation menu
- User profile display
- Logout button

### Content Area
- Breadcrumb navigation
- Success/Error alerts
- Responsive tables with actions
- Form validation with error display
- Confirmation dialogs for delete operations

### Statistics Dashboard
- Total Books count
- Total Categories count
- Total Users count
- Total Admins count
- Quick action buttons

## Validation Rules

### Books
- Title: required, max 255 characters
- Author: required, max 255 characters
- Price: required, numeric, min 0
- Description: required, string
- Cover Image: optional, image, max 2MB

### Categories
- Name: required, unique, max 255 characters
- Icon: optional, string
- Description: optional, string

### Users
- Name: required, max 255 characters
- Email: required, unique
- Password: required, min 6 characters (with confirmation)
- Is Admin: optional, boolean

### Team Members
- Name: required, max 255 characters
- Position: required, max 255 characters
- Description: optional, string
- Image: optional, image, max 2MB

### Testimonials
- Name: required, max 255 characters
- Message: required, string
- Rating: required, integer (1-5)

### FAQs
- Question: required, string
- Answer: required, string

## Routes Overview

```
/admin/dashboard - Dashboard home
/admin/books - List all books
/admin/books/create - Create new book
/admin/books/{book}/edit - Edit book
/admin/books/{book} - Delete book

/admin/categories - List categories
/admin/categories/create - Create category
/admin/categories/{category}/edit - Edit category
/admin/categories/{category} - Delete category

/admin/users - List users
/admin/users/create - Create user
/admin/users/{user}/edit - Edit user
/admin/users/{user} - Delete user

/admin/team-members - List team members
/admin/team-members/create - Create team member
/admin/team-members/{member}/edit - Edit team member
/admin/team-members/{member} - Delete team member

/admin/testimonials - List testimonials
/admin/testimonials/create - Create testimonial
/admin/testimonials/{testimonial}/edit - Edit testimonial
/admin/testimonials/{testimonial} - Delete testimonial

/admin/faqs - List FAQs
/admin/faqs/create - Create FAQ
/admin/faqs/{faq}/edit - Edit FAQ
/admin/faqs/{faq} - Delete FAQ
```

## Security Features

1. **Authentication Check**: All admin routes require user authentication
2. **Admin Middleware**: Only users with `is_admin = true` can access admin panel
3. **Authorization**: Admin status checked on every request
4. **CSRF Protection**: All forms include CSRF tokens
5. **Input Validation**: All inputs are validated server-side
6. **Delete Confirmation**: Confirmation dialogs prevent accidental deletion
7. **Self-Delete Protection**: Users cannot delete their own account

## Styling

- Bootstrap 5 for responsive design
- Font Awesome 6.4 for icons
- Custom CSS for admin theme
- Mobile-responsive layout
- Professional color scheme (Blue primary)

## Image Upload

- Stored in `storage/app/public` directory
- Accessible via `storage/` symlink in public folder
- Support for JPEG, PNG, JPG, GIF formats
- Maximum file size: 2MB
- Automatic path storage in database

## Error Handling

- Form validation errors displayed inline
- Session-based success/error messages
- User-friendly error messages
- Automatic redirect on unauthorized access
- 404 handling for non-existent records

## Future Enhancements

- Advanced search and filtering
- Batch operations (bulk delete/update)
- Export to CSV/Excel
- Import functionality
- Activity logging
- Advanced permission system
- Two-factor authentication
- Dashboard analytics and charts
