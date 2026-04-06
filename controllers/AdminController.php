<?php
/**
 * Admin Controller
 * Handles admin panel operations: dashboard, event/gallery/user management
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

// Load data models
require_once __DIR__ . '/../models/data.php';

class AdminController {

    /**
     * Display admin dashboard
     */
    public function dashboard() {
        requireAdmin();

        $pageTitle = 'Admin Dashboard';
        $stats = getStatistics();
        $recentEvents = array_slice(getAllEvents(), 0, 5);
        $recentMessages = array_slice(getContactMessages(), 0, 5);

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/dashboard.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display events management page
     */
    public function manageEvents() {
        requireAdmin();

        $pageTitle = 'Manage Events';
        $events = getAllEvents();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/manage_events.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display create event form
     */
    public function createEvent() {
        requireAdmin();

        $pageTitle = 'Create Event';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/create_event.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Store new event
     */
    public function storeEvent() {
        requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/admin/events');
            return;
        }

        $errors = [];

        // Validate inputs
        $title = sanitize($_POST['title'] ?? '');
        $description = sanitize($_POST['description'] ?? '');
        $eventDate = sanitize($_POST['event_date'] ?? '');
        $location = sanitize($_POST['location'] ?? '');
        $status = sanitize($_POST['status'] ?? 'upcoming');

        if (empty($title)) {
            $errors['title'] = 'Event title is required';
        }

        if (empty($description)) {
            $errors['description'] = 'Event description is required';
        }

        if (empty($eventDate)) {
            $errors['event_date'] = 'Event date is required';
        }

        if (empty($location)) {
            $errors['location'] = 'Event location is required';
        }

        // Handle image upload
        $imageName = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = uploadFile(
                $_FILES['image'],
                UPLOAD_PATH . '/events'
            );

            if ($uploadResult['success']) {
                $imageName = $uploadResult['filename'];
            } else {
                $errors['image'] = $uploadResult['error'];
            }
        }

        if (!empty($errors)) {
            setErrors($errors);
            setOldInput($_POST);
            redirect('/admin/events/create');
            return;
        }

        // In real application, save to database
        // For now, just show success message

        setFlash('success', 'Event created successfully!', 'success');
        clearErrors();
        clearOldInput();
        redirect('/admin/events');
    }

    /**
     * Display edit event form
     */
    public function editEvent($id) {
        requireAdmin();

        $event = getEventById($id);

        if (!$event) {
            setFlash('error', 'Event not found', 'error');
            redirect('/admin/events');
            return;
        }

        $pageTitle = 'Edit Event';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/edit_event.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Update event
     */
    public function updateEvent($id) {
        requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/admin/events');
            return;
        }

        $event = getEventById($id);

        if (!$event) {
            setFlash('error', 'Event not found', 'error');
            redirect('/admin/events');
            return;
        }

        // Validate and update (similar to storeEvent)
        // In real application, update database

        setFlash('success', 'Event updated successfully!', 'success');
        redirect('/admin/events');
    }

    /**
     * Delete event
     */
    public function deleteEvent($id) {
        requireAdmin();

        $event = getEventById($id);

        if (!$event) {
            setFlash('error', 'Event not found', 'error');
            redirect('/admin/events');
            return;
        }

        // In real application, delete from database
        // Also delete associated image file

        setFlash('success', 'Event deleted successfully!', 'success');
        redirect('/admin/events');
    }

    /**
     * Display gallery management page
     */
    public function manageGallery() {
        requireAdmin();

        $pageTitle = 'Manage Gallery';
        $gallery = getAllGallery();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/manage_gallery.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display upload gallery form
     */
    public function uploadGallery() {
        requireAdmin();

        $pageTitle = 'Upload to Gallery';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/upload_gallery.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Store gallery item
     */
    public function storeGallery() {
        requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/admin/gallery');
            return;
        }

        $errors = [];

        $title = sanitize($_POST['title'] ?? '');
        $description = sanitize($_POST['description'] ?? '');
        $category = sanitize($_POST['category'] ?? '');

        if (empty($title)) {
            $errors['title'] = 'Title is required';
        }

        // Handle image upload
        $imageName = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadResult = uploadFile(
                $_FILES['image'],
                UPLOAD_PATH . '/gallery'
            );

            if ($uploadResult['success']) {
                $imageName = $uploadResult['filename'];
            } else {
                $errors['image'] = $uploadResult['error'];
            }
        } else {
            $errors['image'] = 'Image is required';
        }

        if (!empty($errors)) {
            setErrors($errors);
            setOldInput($_POST);
            redirect('/admin/gallery/upload');
            return;
        }

        // In real application, save to database

        setFlash('success', 'Image uploaded successfully!', 'success');
        clearErrors();
        clearOldInput();
        redirect('/admin/gallery');
    }

    /**
     * Delete gallery item
     */
    public function deleteGallery($id) {
        requireAdmin();

        // In real application, delete from database and file

        setFlash('success', 'Gallery item deleted successfully!', 'success');
        redirect('/admin/gallery');
    }

    /**
     * Display users management page
     */
    public function manageUsers() {
        requireAdmin();

        $pageTitle = 'Manage Users';
        $users = getAllUsers();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/manage_users.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Display edit user form
     */
    public function editUser($id) {
        requireAdmin();

        $user = getUserById($id);

        if (!$user) {
            setFlash('error', 'User not found', 'error');
            redirect('/admin/users');
            return;
        }

        $pageTitle = 'Edit User';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/edit_user.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * Update user
     */
    public function updateUser($id) {
        requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            redirect('/admin/users');
            return;
        }

        // Validate and update user
        // In real application, update database

        setFlash('success', 'User updated successfully!', 'success');
        redirect('/admin/users');
    }

    /**
     * Delete user
     */
    public function deleteUser($id) {
        requireAdmin();

        // Prevent deleting self
        if ($id == getCurrentUserId()) {
            setFlash('error', 'You cannot delete your own account', 'error');
            redirect('/admin/users');
            return;
        }

        // In real application, delete from database

        setFlash('success', 'User deleted successfully!', 'success');
        redirect('/admin/users');
    }

    /**
     * Display contact messages
     */
    public function manageMessages() {
        requireAdmin();

        $pageTitle = 'Contact Messages';
        $messages = getContactMessages();

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/manage_messages.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }

    /**
     * View single message
     */
    public function viewMessage($id) {
        requireAdmin();

        $messages = getContactMessages();
        $message = null;

        foreach ($messages as $msg) {
            if ($msg['id'] == $id) {
                $message = $msg;
                break;
            }
        }

        if (!$message) {
            setFlash('error', 'Message not found', 'error');
            redirect('/admin/messages');
            return;
        }

        $pageTitle = 'View Message';

        require_once __DIR__ . '/../views/layouts/header.php';
        require_once __DIR__ . '/../views/admin/view_message.php';
        require_once __DIR__ . '/../views/layouts/footer.php';
    }
}
