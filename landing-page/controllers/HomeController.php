<?php
/**
 * Home Controller
 * Handles all public-facing pages
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

// Load data models
require_once __DIR__ . '/../models/data.php';

class HomeController {

    /**
     * Display homepage
     */
    public function index() {
        $pageTitle = 'Home';
        $upcomingEvents = getUpcomingEvents(3);
        $latestNews = getLatestNews(3);
        $gallery = array_slice(getAllGallery(), 0, 6);
        $testimonials = getTestimonials(3);
        $stats = getStatistics();
        $demandsAchievements = getDemandsAndAchievements();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/home.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display about page
     */
    public function about() {
        $pageTitle = 'About Us';
        $stats = getStatistics();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/about.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display events listing page
     */
    public function events() {
        $pageTitle = 'Events';
        $events = getAllEvents();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/events.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display single event detail
     */
    public function eventDetail($id) {
        $event = getEventById($id);

        if (!$event) {
            http_response_code(404);
            $pageTitle = '404 - Event Not Found';
            require_once __DIR__ . '/../views/errors/404.php';
            return;
        }

        $pageTitle = $event['title'];
        $relatedEvents = getUpcomingEvents(3);

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/event-detail.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display gallery page
     */
    public function gallery() {
        $pageTitle = 'Gallery';
        $gallery = getAllGallery();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/gallery.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display membership page
     */
    public function membership() {
        $pageTitle = 'Membership';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/membership.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Process membership form submission
     */
    public function membershipSubmit() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/membership');
            return;
        }

        $errors = [];

        // Validate inputs
        $name = sanitize($_POST['name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $phone = sanitize($_POST['phone'] ?? '');
        $businessName = sanitize($_POST['business_name'] ?? '');
        $businessType = sanitize($_POST['business_type'] ?? '');
        $membershipType = sanitize($_POST['membership_type'] ?? '');

        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }

        if (empty($email) || !validateEmail($email)) {
            $errors['email'] = 'Valid email is required';
        }

        if (empty($phone) || !validatePhone($phone)) {
            $errors['phone'] = 'Valid 10-digit phone number is required';
        }

        if (empty($businessName)) {
            $errors['business_name'] = 'Business name is required';
        }

        if (empty($businessType)) {
            $errors['business_type'] = 'Business type is required';
        }

        if (!empty($errors)) {
            setErrors($errors);
            setOldInput($_POST);
            redirect('/membership');
            return;
        }

        // In real application, save to database
        // For now, just show success message

        setFlash('success', 'Thank you for your membership application! We will contact you soon.', 'success');
        clearErrors();
        clearOldInput();
        redirect('/membership');
    }

    /**
     * Display contact page
     */
    public function contact() {
        $pageTitle = 'Contact Us';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/contact.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Process contact form submission
     */
    public function contactSubmit() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/contact');
            return;
        }

        $errors = [];

        // Validate inputs
        $name = sanitize($_POST['name'] ?? '');
        $email = sanitize($_POST['email'] ?? '');
        $phone = sanitize($_POST['phone'] ?? '');
        $subject = sanitize($_POST['subject'] ?? '');
        $message = sanitize($_POST['message'] ?? '');

        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }

        if (empty($email) || !validateEmail($email)) {
            $errors['email'] = 'Valid email is required';
        }

        if (empty($message)) {
            $errors['message'] = 'Message is required';
        }

        if (!empty($errors)) {
            setErrors($errors);
            setOldInput($_POST);
            redirect('/contact');
            return;
        }

        // Save message
        addContactMessage([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ]);

        setFlash('success', 'Thank you for contacting us! We will get back to you soon.', 'success');
        clearErrors();
        clearOldInput();
        redirect('/contact');
    }

    /**
     * Display user profile
     */
    public function profile() {
        requireLogin();

        $pageTitle = 'My Profile';
        $userId = getCurrentUserId();
        $user = getUserById($userId);

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/public/profile.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }
}
