# Pratinidhi Udyog Vyapar Mandal - PHP Web Application

A complete, scalable, production-ready PHP web application built with **Core PHP**, **Bootstrap 5**, and **Tailwind CSS**. This is a CMS-ready platform for trader organizations with full authentication, admin panel, and content management capabilities.

## ✨ Features

### Public Features
- Responsive Homepage with hero slider, statistics, and CTAs
- About Page with mission, vision, and organizational info
- Events System with upcoming/completed events
- Photo Gallery with category filtering
- Membership Registration with validation
- Contact Form with validation
- User Authentication (Login/Register)
- User Profiles

### Admin Features
- Admin Dashboard with statistics
- Event Management (CRUD)
- Gallery Management
- User Management
- Contact Messages management
- Role-based Access Control
- Secure File Upload System

## 🛠 Tech Stack

- **Backend**: Core PHP 7.4+
- **Frontend**: Bootstrap 5.3, Tailwind CSS 3.x, Bootstrap Icons
- **Database**: MySQL-ready (currently simulated with arrays)

## 🚀 Quick Start

1. Place project in web server directory
2. Ensure Apache mod_rewrite is enabled
3. Set upload folder permissions: `chmod -R 755 uploads/`
4. Access: `http://localhost/your-folder/`

## 🔐 Demo Credentials

**Admin:**
- Email: admin@vyaparmandal.com
- Password: admin123

**User:**
- Email: rajesh@example.com
- Password: password123

## 📁 Project Structure

```
/project-root
├── index.php              # Main router
├── .htaccess             # URL rewriting
├── /routes               # Web & admin routes
├── /controllers          # MVC controllers
├── /views                # Page templates
├── /components           # Reusable components
├── /middleware           # Auth & admin middleware
├── /config               # App & DB config
├── /helpers              # Utility functions
├── /models               # Data layer
├── /uploads              # File uploads
└── /assets               # CSS, JS, images
```

## 💾 Database Integration

Currently uses PHP arrays. To connect MySQL:

1. Edit `/config/db.php` with your credentials
2. Execute SQL schema (provided in db.php comments)
3. Replace array functions with database queries

Helper functions are ready:
- `getDBConnection()` - PDO connection
- `fetchAll($sql, $params)` - Get multiple rows
- `fetchOne($sql, $params)` - Get single row

## ⚙️ Configuration

Edit `/config/app.php`:

```php
define('APP_ENV', 'production');  // development or production
define('APP_DEBUG', false);        // Disable in production
define('APP_URL', 'https://yourdomain.com');
define('CONTACT_EMAIL', 'your@email.com');
```

## 🔒 Security Features

- Password hashing with `password_hash()`
- Input sanitization
- SQL injection prevention (prepared statements)
- CSRF token helpers included
- Session-based authentication
- Role-based access control
- Secure file upload validation
- Direct access prevention

## 📖 Key Routes

**Public:**
- `/` - Homepage
- `/about` - About page
- `/events` - Events listing
- `/gallery` - Photo gallery
- `/membership` - Join form
- `/contact` - Contact form
- `/login` - User login
- `/register` - Registration

**Admin:**
- `/admin/dashboard` - Dashboard
- `/admin/events` - Manage events
- `/admin/gallery` - Manage gallery
- `/admin/users` - Manage users
- `/admin/messages` - View messages

## 🎨 Customization

### Colors
Edit `/assets/css/style.css`:
```css
:root {
    --primary-color: #0d6efd;
    --warning-color: #ffc107;
}
```

### Content
- Homepage: `/views/public/home.php`
- Data: `/models/data.php`

## 📝 Usage Examples

### Flash Messages
```php
setFlash('success', 'Operation successful!', 'success');
```

### File Upload
```php
$result = uploadFile($_FILES['image'], UPLOAD_PATH . '/events');
```

### Validation
```php
if (empty($name)) {
    $errors['name'] = 'Name is required';
}
setErrors($errors);
```

## 🐛 Troubleshooting

**404 Errors:**
- Enable mod_rewrite in Apache
- Allow .htaccess overrides

**Permission Issues:**
```bash
chmod -R 755 uploads/
```

**Upload Fails:**
Check php.ini:
```ini
upload_max_filesize = 10M
post_max_size = 10M
```

## 🎯 Future Enhancements

- Email verification
- Password reset
- Newsletter system
- Member directory
- Payment gateway
- API endpoints
- Multi-language support

## 📞 Support

- Email: info@vyaparmandal.com
- Phone: +91 98765 43210

## 🙏 Credits

Built with Bootstrap 5, Tailwind CSS, and Bootstrap Icons.

**Version:** 1.0.0  
**Last Updated:** April 2026

---

**🚀 Ready for Production - Happy Coding!**
