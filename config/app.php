<?php
/**
 * Application Configuration
 * Core application settings and constants
 */

// Environment
define('APP_ENV', 'development'); // development, production
define('APP_DEBUG', true); // Set to false in production

// Application Details
define('APP_NAME', 'Pratinidhi Udyog Vyapar Mandal');
define('APP_URL', 'http://localhost');
define('APP_VERSION', '1.0.0');

// Paths
define('BASE_PATH', dirname(__DIR__));
define('VIEWS_PATH', BASE_PATH . '/views');
define('COMPONENTS_PATH', BASE_PATH . '/components');
define('CONTROLLERS_PATH', BASE_PATH . '/controllers');
define('UPLOAD_PATH', BASE_PATH . '/uploads');
define('ASSETS_PATH', BASE_PATH . '/assets');

// Session Configuration
define('SESSION_LIFETIME', 7200); // 2 hours in seconds
define('SESSION_NAME', 'VYAPAR_SESSION');

// Upload Configuration
define('MAX_UPLOAD_SIZE', 5242880); // 5MB in bytes
define('ALLOWED_IMAGE_TYPES', ['image/jpeg', 'image/png', 'image/gif', 'image/webp']);
define('ALLOWED_EXTENSIONS', ['jpg', 'jpeg', 'png', 'gif', 'webp']);

// Pagination
define('ITEMS_PER_PAGE', 12);
define('ADMIN_ITEMS_PER_PAGE', 20);

// Security
define('CSRF_TOKEN_NAME', '_csrf_token');
define('PASSWORD_MIN_LENGTH', 8);

// Contact Information
define('CONTACT_EMAIL', 'office@vyapariekta.com');
define('CONTACT_PHONE', '+91 9792043767');
define('CONTACT_ADDRESS', 'Uttar Pradesh, India');

// Social Media Links
define('SOCIAL_FACEBOOK', 'https://facebook.com/vyaparmandal');
define('SOCIAL_TWITTER', 'https://twitter.com/vyaparmandal');
define('SOCIAL_INSTAGRAM', 'https://instagram.com/vyaparmandal');
define('SOCIAL_LINKEDIN', 'https://linkedin.com/company/vyaparmandal');
define('SOCIAL_YOUTUBE', 'https://youtube.com/@vyaparmandal');

// Error Reporting
if (APP_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(0);
    ini_set('display_errors', 0);
}

// Timezone
date_default_timezone_set('Asia/Kolkata');

return [
    'app_name' => APP_NAME,
    'app_url' => APP_URL,
    'environment' => APP_ENV,
    'debug' => APP_DEBUG,
];
