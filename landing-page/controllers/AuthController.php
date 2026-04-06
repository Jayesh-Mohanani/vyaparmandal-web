<?php
/**
 * Auth Controller
 * Handles authentication: login, registration, logout
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

// Load data models
require_once __DIR__ . '/../models/data.php';

class AuthController {

    /**
     * Display login form
     */
    public function showLogin() {
        // Redirect if already logged in
        if (isLoggedIn()) {
            if (isAdmin()) {
                redirect('/admin/dashboard');
            } else {
                redirect('/profile');
            }
            return;
        }

        $pageTitle = 'Login';
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/login.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Process login
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/login');
            return;
        }

        $errors = [];

        // Get inputs
        $email = sanitize($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validate
        if (empty($email) || !validateEmail($email)) {
            $errors['email'] = 'Valid email is required';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        }

        if (!empty($errors)) {
            setErrors($errors);
            setOldInput(['email' => $email]);
            redirect('/login');
            return;
        }

        // Check credentials
        $user = getUserByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            setErrors(['login' => 'Invalid email or password']);
            setOldInput(['email' => $email]);
            redirect('/login');
            return;
        }

        // Set session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        clearErrors();
        clearOldInput();

        // Redirect based on role
        if ($user['role'] === 'admin') {
            setFlash('success', 'Welcome back, ' . $user['name'] . '!', 'success');
            redirect('/admin/dashboard');
        } else {
            setFlash('success', 'Login successful!', 'success');
            redirect('/profile');
        }
    }

    /**
     * Display registration form
     */
    public function showRegister() {
        // Redirect if already logged in
        if (isLoggedIn()) {
            redirect('/profile');
            return;
        }

        $pageTitle = 'Register';
        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/auth/register.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Process registration
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/register');
            return;
        }

        $errors = [];

        // Get inputs
        $name = sanitize($_POST['name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $phone = sanitize($_POST['phone'] ?? '');
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Validate
        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }

        if (empty($email) || !validateEmail($email)) {
            $errors['email'] = 'Valid email is required';
        } else {
            // Check if email already exists
            if (getUserByEmail($email)) {
                $errors['email'] = 'Email already registered';
            }
        }

        if (empty($phone) || !validatePhone($phone)) {
            $errors['phone'] = 'Valid 10-digit phone number is required';
        }

        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < PASSWORD_MIN_LENGTH) {
            $errors['password'] = 'Password must be at least ' . PASSWORD_MIN_LENGTH . ' characters';
        }

        if ($password !== $confirmPassword) {
            $errors['confirm_password'] = 'Passwords do not match';
        }

        if (!empty($errors)) {
            setErrors($errors);
            setOldInput([
                'name' => $name,
                'email' => $email,
                'phone' => $phone
            ]);
            redirect('/register');
            return;
        }

        // In real application, save to database
        // For now, just show success message and redirect to login

        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Simulate user creation
        // In real app: INSERT INTO users ...

        setFlash('success', 'Registration successful! Please login to continue.', 'success');
        clearErrors();
        clearOldInput();
        redirect('/login');
    }

    /**
     * Logout user
     */
    public function logout() {
        // Clear all session data
        $_SESSION = [];

        // Destroy session cookie
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 3600, '/');
        }

        // Destroy session
        session_destroy();

        // Start new session for flash message
        session_start();
        setFlash('success', 'You have been logged out successfully.', 'success');

        redirect('/login');
    }
}
