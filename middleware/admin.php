<?php
/**
 * Admin Middleware
 * Checks if user has admin privileges before allowing access
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

/**
 * Check if user has admin privileges
 *
 * @return bool True if admin
 */
function checkAdmin() {
    if (!isLoggedIn()) {
        setFlash('error', 'Please login to access this page', 'error');
        redirect('/login');
        return false;
    }

    if (!isAdmin()) {
        setFlash('error', 'Access denied. Administrator privileges required.', 'error');
        redirect('/');
        return false;
    }

    return true;
}

/**
 * Admin middleware function
 *
 * @return void
 */
function adminMiddleware() {
    checkAdmin();
}
