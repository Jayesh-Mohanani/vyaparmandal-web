<?php
/**
 * Helper Functions
 * Utility functions used throughout the application
 */

/**
 * Sanitize input data
 *
 * @param string $data Input data
 * @return string Sanitized data
 */
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * Redirect to a URL
 *
 * @param string $path Path to redirect to
 * @return void
 */
function redirect($path) {
    if (preg_match('#^https?://#i', $path)) {
        header('Location: ' . $path);
        exit();
    }

    $baseUrl = rtrim(BASE_URL, '/');
    $path = '/' . ltrim($path, '/');

    if ($baseUrl === '') {
        header('Location: ' . $path);
    } else {
        header('Location: ' . $baseUrl . $path);
    }
    exit();
}

/**
 * Get current URL path
 *
 * @return string Current path
 */
function getCurrentPath() {
    $path = $_SERVER['REQUEST_URI'];
    $path = parse_url($path, PHP_URL_PATH) ?: '/';

    $baseUrl = rtrim(BASE_URL, '/');
    if ($baseUrl !== '' && strpos($path, $baseUrl) === 0) {
        $path = substr($path, strlen($baseUrl));
    }

    $path = rtrim($path, '/');

    return $path === '' ? '/' : $path;
}

/**
 * Get a safe return path for auth flows.
 *
 * @param string $fallback Fallback route when the current page is auth-related
 * @return string
 */
function getReturnToPath($fallback = '/') {
    $path = getCurrentPath();

    if (in_array($path, ['/login', '/register', '/logout'], true)) {
        return $fallback;
    }

    return $path;
}

/**
 * Check if current page is active
 *
 * @param string $page Page to check
 * @return string 'active' if current page matches
 */
function isActive($page) {
    $currentPath = getCurrentPath();
    if ($currentPath === '' || $currentPath === '/') {
        $currentPath = '/';
    }
    return ($currentPath === $page || strpos($currentPath, $page) === 0) ? 'active' : '';
}

/**
 * Generate CSRF token
 *
 * @return string CSRF token
 */
function generateCSRFToken() {
    if (empty($_SESSION[CSRF_TOKEN_NAME])) {
        $_SESSION[CSRF_TOKEN_NAME] = bin2hex(random_bytes(32));
    }
    return $_SESSION[CSRF_TOKEN_NAME];
}

/**
 * Verify CSRF token
 *
 * @param string $token Token to verify
 * @return bool True if valid
 */
function verifyCSRFToken($token) {
    return isset($_SESSION[CSRF_TOKEN_NAME]) && hash_equals($_SESSION[CSRF_TOKEN_NAME], $token);
}

/**
 * Display flash message
 *
 * @param string $key Message key
 * @param string $message Message text
 * @param string $type Message type (success, error, warning, info)
 * @return void
 */
function setFlash($key, $message, $type = 'info') {
    $_SESSION['flash'][$key] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Get and clear flash message
 *
 * @param string $key Message key
 * @return array|null Flash message data
 */
function getFlash($key) {
    if (isset($_SESSION['flash'][$key])) {
        $flash = $_SESSION['flash'][$key];
        unset($_SESSION['flash'][$key]);
        return $flash;
    }
    return null;
}

/**
 * Check if user is logged in
 *
 * @return bool True if logged in
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

/**
 * Check if user is admin
 *
 * @return bool True if admin
 */
function isAdmin() {
    return isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
}

/**
 * Get current user ID
 *
 * @return int|null User ID or null
 */
function getCurrentUserId() {
    return $_SESSION['user_id'] ?? null;
}

/**
 * Get current user role
 *
 * @return string|null User role or null
 */
function getCurrentUserRole() {
    return $_SESSION['role'] ?? null;
}

/**
 * Format date
 *
 * @param string $date Date string
 * @param string $format Format string
 * @return string Formatted date
 */
function formatDate($date, $format = 'd M Y') {
    return date($format, strtotime($date));
}

/**
 * Truncate text
 *
 * @param string $text Text to truncate
 * @param int $length Maximum length
 * @param string $suffix Suffix to add
 * @return string Truncated text
 */
function truncate($text, $length = 100, $suffix = '...') {
    if (strlen($text) > $length) {
        return substr($text, 0, $length) . $suffix;
    }
    return $text;
}

/**
 * Upload file
 *
 * @param array $file File from $_FILES
 * @param string $destination Destination folder
 * @param array $allowedTypes Allowed MIME types
 * @return array Upload result ['success' => bool, 'filename' => string, 'error' => string]
 */
function uploadFile($file, $destination, $allowedTypes = ALLOWED_IMAGE_TYPES) {
    $result = ['success' => false, 'filename' => '', 'error' => ''];

    // Check for upload errors
    if ($file['error'] !== UPLOAD_ERR_OK) {
        $result['error'] = 'File upload failed with error code: ' . $file['error'];
        return $result;
    }

    // Check file size
    if ($file['size'] > MAX_UPLOAD_SIZE) {
        $result['error'] = 'File size exceeds maximum allowed size of ' . (MAX_UPLOAD_SIZE / 1048576) . 'MB';
        return $result;
    }

    // Check file type
    $fileType = mime_content_type($file['tmp_name']);
    if (!in_array($fileType, $allowedTypes)) {
        $result['error'] = 'File type not allowed. Allowed types: ' . implode(', ', $allowedTypes);
        return $result;
    }

    // Check file extension
    $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($extension, ALLOWED_EXTENSIONS)) {
        $result['error'] = 'File extension not allowed';
        return $result;
    }

    // Generate unique filename
    $filename = uniqid() . '_' . time() . '.' . $extension;
    $targetPath = $destination . '/' . $filename;

    // Create directory if it doesn't exist
    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    // Move uploaded file
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        $result['success'] = true;
        $result['filename'] = $filename;
    } else {
        $result['error'] = 'Failed to move uploaded file';
    }

    return $result;
}

/**
 * Delete file
 *
 * @param string $filepath Full file path
 * @return bool True if deleted
 */
function deleteFile($filepath) {
    if (file_exists($filepath)) {
        return unlink($filepath);
    }
    return false;
}

/**
 * Validate email
 *
 * @param string $email Email to validate
 * @return bool True if valid
 */
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Validate phone number (Indian format)
 *
 * @param string $phone Phone number
 * @return bool True if valid
 */
function validatePhone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    return strlen($phone) === 10;
}

/**
 * Generate slug from string
 *
 * @param string $string String to slugify
 * @return string Slug
 */
function slugify($string) {
    $string = strtolower($string);
    $string = preg_replace('/[^a-z0-9-]/', '-', $string);
    $string = preg_replace('/-+/', '-', $string);
    return trim($string, '-');
}

/**
 * Asset URL helper
 *
 * @param string $path Asset path
 * @return string Full asset URL
 */
function asset($path) {
    return BASE_URL . '/assets/' . ltrim($path, '/');
}

/**
 * URL helper
 *
 * @param string $path URL path
 * @return string Full URL
 */
function url($path = '') {
    return BASE_URL . '/' . ltrim($path, '/');
}

/**
 * Old input helper (for form repopulation)
 *
 * @param string $key Input key
 * @param string $default Default value
 * @return string Old input value
 */
function old($key, $default = '') {
    return $_SESSION['old'][$key] ?? $default;
}

/**
 * Set old input
 *
 * @param array $data Input data
 * @return void
 */
function setOldInput($data) {
    $_SESSION['old'] = $data;
}

/**
 * Clear old input
 *
 * @return void
 */
function clearOldInput() {
    unset($_SESSION['old']);
}

/**
 * Get validation errors
 *
 * @param string $key Error key
 * @return string|null Error message
 */
function getError($key) {
    return $_SESSION['errors'][$key] ?? null;
}

/**
 * Set validation errors
 *
 * @param array $errors Errors array
 * @return void
 */
function setErrors($errors) {
    $_SESSION['errors'] = $errors;
}

/**
 * Clear validation errors
 *
 * @return void
 */
function clearErrors() {
    unset($_SESSION['errors']);
}

/**
 * Require login
 *
 * @return void
 */
function requireLogin() {
    if (!isLoggedIn()) {
        setFlash('error', 'Please login to access this page', 'error');
        $_SESSION['auth_return_to'] = getReturnToPath('/');
        redirect('/login');
    }
}

/**
 * Require admin
 *
 * @return void
 */
function requireAdmin() {
    requireLogin();
    if (!isAdmin()) {
        setFlash('error', 'Access denied. Admin privileges required.', 'error');
        redirect('/');
    }
}

/**
 * Dump and die (for debugging)
 *
 * @param mixed $data Data to dump
 * @return void
 */
function dd($data) {
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die();
}
