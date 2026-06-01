# 📚 Online Book Store

An Online Book Store web application developed using **Laravel**.  
This project was created as a **Final Semester Project** in collaboration as a team.  
The system allows users to browse, search, and purchase books online through a modern and user-friendly interface.

---

## 👨‍💻 Team Project

This project was collaboratively developed by a team of 2 members as part of the semester final project.

### Team Members
- Sles Sakirin
- Lon Tola

---

## 🚀 Features

### User Features
- User registration and login
- Browse books by category
- Search books by title or author
- View detailed book information
- Shopping cart functionality
- Checkout process
- Order history and tracking
- Responsive design
- Timeline event updates

### Admin Features
- **Admin Dashboard** - Overview of key metrics and statistics
- **Book Management** - Add, edit, delete books with image uploads
- **Category Management** - Create and manage book categories
- **User Management** - View and manage user accounts
- **Order Management** - View, track, and manage customer orders
- **Timeline Events** - Create and manage timeline events with icon picker
- **Order Statistics** - Monitor order trends and revenue

---

## 🛠️ Technologies Used

### Backend
- **Laravel 11** - PHP web framework
- **PHP 8.2+** - Server-side language
- **MySQL/SQLite** - Database

### Frontend
- **Blade Template Engine** - Laravel templating
- **Tailwind CSS** - Utility-first CSS framework
- **HTML5** - Semantic markup
- **JavaScript** - Client-side interactivity
- **Alpine.js** - Lightweight JavaScript framework (optional)

### Tools & Dependencies
- **Composer** - PHP package manager
- **npm** - JavaScript package manager
- **Vite** - Frontend build tool
- **Git & GitHub** - Version control
- **XAMPP / Laragon** - Local development environment

---

## 📂 Project Structure

```bash
app/
├── Http/
│   ├── Controllers/        # Application controllers
│   ├── Middleware/        # HTTP middleware
│   └── Requests/          # Form request validation
├── Models/                # Database models
└── Traits/                # Reusable traits
bootstrap/                 # Bootstrap framework files
config/                    # Application configuration
database/
├── migrations/            # Database migrations
├── seeders/              # Database seeders
└── factories/            # Model factories
public/                    # Web root directory
resources/
├── views/                # Blade templates
├── css/                  # CSS stylesheets
└── js/                   # JavaScript files
routes/
├── web.php               # Web routes
├── api.php               # API routes
└── console.php           # Console routes
storage/                   # Logs, cache, uploads
tests/                     # Test files
.env.example              # Environment template
composer.json             # PHP dependencies
package.json              # NPM dependencies
```

---

## ⚙️ Installation

### Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & npm
- MySQL or SQLite
- Web server (Apache, Nginx, or PHP built-in server)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/SpicyTech2823/Book_Store_Laravel.git
   cd Book_Store_Laravel
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Configure your database** - Edit `.env` file:
   ```env
   DB_CONNECTION=mysql        # or sqlite
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=bookstore
   DB_USERNAME=root
   DB_PASSWORD=
   ```

6. **Generate application key**
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations**
   ```bash
   php artisan migrate
   ```

8. **Seed the database** (optional - adds sample data)
   ```bash
   php artisan db:seed
   ```

9. **Build frontend assets**
   ```bash
   npm run dev
   ```
   For production:
   ```bash
   npm run build
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```
    Application will be available at `http://localhost:8000`

---

## 🚀 Quick Start

After installation, you can:

1. **Access the application** - http://localhost:8000
2. **Admin panel** - http://localhost:8000/admin
3. **Default credentials** - (check database seeders for credentials)

### Initial Setup Tasks
- Create an admin account
- Add book categories
- Upload initial book inventory
- Configure store settings

---

## 📋 Environment Configuration

Key environment variables in `.env`:

```env
APP_NAME=BookStore
APP_ENV=local              # local, production
APP_DEBUG=true             # Set to false in production
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_DATABASE=bookstore
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=database
CACHE_STORE=database
```

---

## 🧪 Testing & Development

```bash
# Run tests
php artisan test

# Generate test coverage
php artisan test --coverage

# Check code style
composer lint

# Fix code style
composer format
```

---

## 📚 Project Features in Detail

### Book Management
- Filter and search across book catalog
- Category-based organization
- Book image management
- Price and inventory tracking

### Order System
- Complete order lifecycle management
- Order status tracking
- Customer order history
- Order statistics and analytics

### Timeline Events
- Create custom timeline events
- Icon picker for event customization
- Event display on frontend
- Admin control over event visibility

### User System
- Role-based access control (User, Admin)
- User profile management
- Secure authentication with hashing

---

## 🤝 Contributing

1. Create a new branch for your feature
   ```bash
   git checkout -b feature/feature-name
   ```

2. Make your changes and commit
   ```bash
   git add .
   git commit -m "Add feature description"
   ```

3. Push to the branch
   ```bash
   git push origin feature/feature-name
   ```

4. Create a Pull Request

### Code Standards
- Follow PSR-12 coding standards
- Write meaningful commit messages
- Add tests for new features
- Update documentation as needed

---

## 🐛 Troubleshooting

### Common Issues

**Issue: "No application encryption key has been specified"**
```bash
php artisan key:generate
```

**Issue: Database connection error**
- Verify database credentials in `.env`
- Ensure database server is running
- Check database name exists

**Issue: Permission denied on storage**
```bash
chmod -R 775 storage bootstrap/cache
```

**Issue: NPM or Composer packages not found**
```bash
rm -rf node_modules vendor package-lock.json composer.lock
npm install
composer install
```

---

## 📄 License

This project is created for educational purposes as a semester final project at RUPP.

---

## 📞 Support

For questions or issues:
- Check existing GitHub issues
- Create a new issue with detailed description
- Contact team members

---

**Last Updated:** 2026-06-01  
**Version:** 1.0.0




