<?php
/**
 * Simulated Data Models
 * Arrays simulating database tables - to be replaced with actual DB queries later
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

/**
 * Get all users (simulated)
 */
function getAllUsers() {
    return [
        [
            'id' => 1,
            'name' => 'Admin User',
            'email' => 'admin@vyaparmandal.com',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'role' => 'admin',
            'phone' => '9792043767',
            'created_at' => '2024-01-15 10:30:00'
        ],
        [
            'id' => 2,
            'name' => 'Rajesh Kumar',
            'email' => 'rajesh@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role' => 'user',
            'phone' => '9876543210',
            'created_at' => '2024-02-20 14:20:00'
        ],
        [
            'id' => 3,
            'name' => 'Priya Sharma',
            'email' => 'priya@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT),
            'role' => 'user',
            'phone' => '9765432109',
            'created_at' => '2024-03-10 09:15:00'
        ]
    ];
}

/**
 * Get user by email
 */
function getUserByEmail($email) {
    $users = getAllUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}

/**
 * Get user by ID
 */
function getUserById($id) {
    $users = getAllUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}

/**
 * Get all events (simulated)
 */
function getAllEvents() {
    return [
        [
            'id' => 1,
            'title' => 'व्यापारी महाकुंभ 2026',
            'description' => 'A grand gathering of traders and business owners from across Uttar Pradesh to discuss trade policies, GST reforms, and business opportunities.',
            'event_date' => '2026-05-15',
            'location' => 'Lucknow, Uttar Pradesh',
            'image' => 'event-image-1.jpg',
            'status' => 'upcoming',
            'created_at' => '2024-03-01 10:00:00'
        ],
        [
            'id' => 2,
            'title' => 'GST Awareness Workshop',
            'description' => 'Interactive workshop on GST compliance, filing returns, and understanding recent policy changes affecting small businesses.',
            'event_date' => '2026-04-20',
            'location' => 'Kanpur, Uttar Pradesh',
            'image' => 'event-image-2.jpg',
            'status' => 'upcoming',
            'created_at' => '2024-03-10 11:30:00'
        ],
        [
            'id' => 3,
            'title' => 'Digital Business Summit',
            'description' => 'Learn about digital transformation, e-commerce strategies, and online marketing for traditional businesses.',
            'event_date' => '2026-06-10',
            'location' => 'Varanasi, Uttar Pradesh',
            'image' => 'event-image-3.jpg',
            'status' => 'upcoming',
            'created_at' => '2024-03-15 14:00:00'
        ],
        [
            'id' => 4,
            'title' => 'Annual Traders Conference',
            'description' => 'Annual conference featuring industry leaders, policy makers, and successful entrepreneurs sharing insights and experiences.',
            'event_date' => '2024-12-20',
            'location' => 'Agra, Uttar Pradesh',
            'image' => 'event-image-4.jpg',
            'status' => 'completed',
            'created_at' => '2024-01-05 09:00:00'
        ]
    ];
}

/**
 * Get event by ID
 */
function getEventById($id) {
    $events = getAllEvents();
    foreach ($events as $event) {
        if ($event['id'] == $id) {
            return $event;
        }
    }
    return null;
}

/**
 * Get upcoming events
 */
function getUpcomingEvents($limit = null) {
    $events = getAllEvents();
    $upcoming = array_filter($events, function($event) {
        return $event['status'] === 'upcoming' && strtotime($event['event_date']) >= time();
    });

    // Sort by event date
    usort($upcoming, function($a, $b) {
        return strtotime($a['event_date']) - strtotime($b['event_date']);
    });

    return $limit ? array_slice($upcoming, 0, $limit) : $upcoming;
}

/**
 * Get all gallery items (simulated)
 */
function getAllGallery() {
    return [
        [
            'id' => 1,
            'title' => 'व्यापारी सम्मेलन 2024',
            'description' => 'Annual trader conference with over 500 participants',
            'image' => 'gallery-image-1.jpg',
            'category' => 'events',
            'created_at' => '2024-01-20 10:00:00'
        ],
        [
            'id' => 2,
            'title' => 'Meeting with State Officials',
            'description' => 'Delegation meeting with state government officials',
            'image' => 'gallery-image-2.jpg',
            'category' => 'meetings',
            'created_at' => '2024-02-15 11:30:00'
        ],
        [
            'id' => 3,
            'title' => 'GST Workshop Session',
            'description' => 'Interactive GST training workshop',
            'image' => 'gallery-image-3.jpg',
            'category' => 'workshops',
            'created_at' => '2024-03-05 09:00:00'
        ],
        [
            'id' => 4,
            'title' => 'Award Ceremony',
            'description' => 'Recognition ceremony for outstanding traders',
            'image' => 'gallery-image-4.jpg',
            'category' => 'awards',
            'created_at' => '2024-03-20 16:00:00'
        ],
        [
            'id' => 5,
            'title' => 'Business Networking Event',
            'description' => 'Networking session with local business owners',
            'image' => 'gallery-image-5.jpg',
            'category' => 'events',
            'created_at' => '2024-03-25 14:30:00'
        ],
        [
            'id' => 6,
            'title' => 'Press Conference',
            'description' => 'Media briefing on trade policy reforms',
            'image' => 'gallery-image-6.jpg',
            'category' => 'press',
            'created_at' => '2024-03-28 12:00:00'
        ]
    ];
}

/**
 * Get gallery by category
 */
function getGalleryByCategory($category, $limit = null) {
    $gallery = getAllGallery();
    $filtered = array_filter($gallery, function($item) use ($category) {
        return $item['category'] === $category;
    });

    return $limit ? array_slice($filtered, 0, $limit) : $filtered;
}

/**
 * Get latest news (simulated)
 */
function getLatestNews($limit = null) {
    $news = [
        [
            'id' => 1,
            'title' => 'व्यापारी कल्याण बोर्ड का गठन',
            'content' => 'Uttar Pradesh government announces formation of Trader Welfare Board to address concerns of small and medium businesses.',
            'image' => 'news-image-1.jpg',
            'published_date' => '2026-04-01',
            'created_at' => '2026-04-01 10:00:00'
        ],
        [
            'id' => 2,
            'title' => 'GST Exemption Limit Raised',
            'content' => 'Government increases GST exemption limit to Rs 40 lakhs, benefiting thousands of small traders across the state.',
            'image' => 'news-image-2.jpg',
            'published_date' => '2026-03-28',
            'created_at' => '2026-03-28 09:30:00'
        ],
        [
            'id' => 3,
            'title' => 'Digital Payment Incentives Announced',
            'content' => 'New incentive scheme for businesses adopting digital payment systems, promoting cashless economy.',
            'image' => 'news-image-3.jpg',
            'published_date' => '2026-03-25',
            'created_at' => '2026-03-25 11:00:00'
        ]
    ];

    // Sort by published date (newest first)
    usort($news, function($a, $b) {
        return strtotime($b['published_date']) - strtotime($a['published_date']);
    });

    return $limit ? array_slice($news, 0, $limit) : $news;
}

/**
 * Get statistics (simulated)
 */
function getStatistics() {
    return [
        'total_members' => 15240,
        'total_awards' => 47,
        'total_events' => 156,
        'active_officials' => 32,
        'years_active' => 15
    ];
}

/**
 * Get testimonials (simulated)
 */
function getTestimonials($limit = null) {
    $testimonials = [
        [
            'id' => 1,
            'name' => 'Ramesh Gupta',
            'business' => 'Textile Merchant',
            'location' => 'Kanpur',
            'message' => 'व्यापार मंडल ने हमारी समस्याओं को सरकार तक पहुंचाने में महत्वपूर्ण भूमिका निभाई है। GST में छूट मिलने से हमारे व्यापार को बहुत फायदा हुआ है।',
            'rating' => 5,
            'image' => 'testimonial-image-1.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Sunita Verma',
            'business' => 'Retail Store Owner',
            'location' => 'Lucknow',
            'message' => 'The workshops and training programs have helped me modernize my business. I am now accepting digital payments and have seen a 40% increase in sales.',
            'rating' => 5,
            'image' => 'testimonial-image-2.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Amit Singh',
            'business' => 'Electronics Dealer',
            'location' => 'Varanasi',
            'message' => 'Being part of this mandal has given me access to networking opportunities and valuable business insights. Highly recommended for all traders.',
            'rating' => 5,
            'image' => 'testimonial-image-3.jpg'
        ]
    ];

    return $limit ? array_slice($testimonials, 0, $limit) : $testimonials;
}

/**
 * Get contact messages (simulated - stored in session)
 */
function getContactMessages() {
    if (!isset($_SESSION['contact_messages'])) {
        $_SESSION['contact_messages'] = [];
    }
    return $_SESSION['contact_messages'];
}

/**
 * Add contact message
 */
function addContactMessage($data) {
    if (!isset($_SESSION['contact_messages'])) {
        $_SESSION['contact_messages'] = [];
    }

    $message = [
        'id' => count($_SESSION['contact_messages']) + 1,
        'name' => $data['name'],
        'email' => $data['email'],
        'phone' => $data['phone'] ?? '',
        'subject' => $data['subject'] ?? 'General Inquiry',
        'message' => $data['message'],
        'status' => 'new',
        'created_at' => date('Y-m-d H:i:s')
    ];

    $_SESSION['contact_messages'][] = $message;
    return $message;
}

/**
 * Get demands and achievements
 */
function getDemandsAndAchievements() {
    return [
        'demands' => [
            'Market fee (मंडी शुल्क) elimination',
            'GST simplification and rate reduction',
            'Online shopping regulation to protect local traders',
            'Reduction in electricity tariffs for commercial use',
            'Simplified business licensing procedures',
            'Protection from unfair e-commerce practices'
        ],
        'achievements' => [
            'GST exemption limit raised to ₹40 lakhs',
            'Trader insurance scheme launched',
            'Formation of Trader Welfare Board',
            'Reduction in market fees by 50%',
            'Digital payment incentive scheme',
            'Simplified tax filing process'
        ]
    ];
}
