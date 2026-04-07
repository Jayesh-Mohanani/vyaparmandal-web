<?php
/**
 * Authentication Middleware
 * Checks if user is logged in before allowing access
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

/**
 * Check if user is authenticated
 *
 * @return bool True if authenticated
 */
function checkAuth() {
    if (!isLoggedIn()) {
        setFlash('error', 'Please login to access this page', 'error');
        $_SESSION['auth_return_to'] = getReturnToPath('/');
        redirect('/login');
        return false;
    }
    return true;
}

/**
 * Auth middleware function
 *
 * @return void
 */
function authMiddleware() {
    checkAuth();
}
