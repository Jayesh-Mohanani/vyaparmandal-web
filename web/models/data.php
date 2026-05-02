<?php
/**
 * Simulated Data Models
 * Arrays simulating database tables - to be replaced with actual DB queries later
 */

// Prevent direct access
if (!defined('APP_NAME')) {
    die('Direct access not permitted');
}

require_once __DIR__ . '/../config/db.php';

/**
 * Get all users (simulated)
 */
function getAllUsers() {
    $sql = "SELECT id, fullName AS name, email, password, role, mobileNumber AS phone, createdAt AS created_at
            FROM users
            WHERE status = :status";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['status' => 1]);
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log('getAllUsers error: ' . $e->getMessage());
        return [];
    }
}

/**
 * Get user by email
 */
function getUserByEmail($email) {
    $email = trim((string)$email);
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return null;
    }

    $sql = "SELECT id, fullName AS name, email, password, role, mobileNumber AS phone, createdAt AS created_at
            FROM users
            WHERE email = :email AND status = :status
            LIMIT 1";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'status' => 1
        ]);
        $user = $stmt->fetch();
        return $user ?: null;
    } catch (PDOException $e) {
        error_log('getUserByEmail error: ' . $e->getMessage());
        return null;
    }
}

/**
 * Get user by ID
 */
function getUserById($id) {
    $id = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false) {
        return null;
    }

    $sql = "SELECT id, fullName AS name, email, password, role, mobileNumber AS phone, createdAt AS created_at
            FROM users
            WHERE id = :id AND status = :status
            LIMIT 1";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'status' => 1
        ]);
        $user = $stmt->fetch();
        return $user ?: null;
    } catch (PDOException $e) {
        error_log('getUserById error: ' . $e->getMessage());
        return null;
    }
}

/**
 * Get all events (simulated)
 */
function getAllEvents() {
    $sql = "SELECT
                id,
                name AS title,
                description,
                date AS event_date,
                location,
                imagePath AS image,
                CASE
                    WHEN TIMESTAMP(date, time) >= NOW() THEN 'upcoming'
                    ELSE 'completed'
                END AS status,
                CONCAT(date, ' ', time) AS created_at
            FROM events
            ORDER BY date DESC, time DESC";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    } catch (PDOException $e) {
        error_log('getAllEvents error: ' . $e->getMessage());
        return [];
    }
}

/**
 * Get event by ID
 */
function getEventById($id) {
    $id = filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false) {
        return null;
    }

    $sql = "SELECT
                id,
                name AS title,
                description,
                date AS event_date,
                location,
                imagePath AS image,
                CASE
                    WHEN TIMESTAMP(date, time) >= NOW() THEN 'upcoming'
                    ELSE 'completed'
                END AS status,
                CONCAT(date, ' ', time) AS created_at
            FROM events
            WHERE id = :id
            LIMIT 1";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $event = $stmt->fetch();
        return $event ?: null;
    } catch (PDOException $e) {
        error_log('getEventById error: ' . $e->getMessage());
        return null;
    }
}

/**
 * Create a password reset token
 */
function createPasswordResetToken($userId, $token, $expiry) {
    $userId = filter_var($userId, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $token = trim((string)$token);
    $expiry = trim((string)$expiry);

    if ($userId === false || $token === '' || $expiry === '') {
        return false;
    }

    $sql = "INSERT INTO password_resets (user_id, token, expires_at, created_at)
            VALUES (:user_id, :token, :expires_at, NOW())";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'user_id' => $userId,
            'token' => $token,
            'expires_at' => $expiry
        ]);
    } catch (PDOException $e) {
        error_log('createPasswordResetToken error: ' . $e->getMessage());
        return false;
    }
}

/**
 * Get user by password reset token
 */
function getUserByResetToken($token) {
    $token = trim((string)$token);
    if ($token === '') {
        return null;
    }

    $sql = "SELECT u.id, u.fullName AS name, u.email, u.password, u.role,
                   u.mobileNumber AS phone, u.createdAt AS created_at
            FROM password_resets pr
            INNER JOIN users u ON u.id = pr.user_id
            WHERE pr.token = :token
              AND pr.expires_at >= NOW()
              AND u.status = :status
            ORDER BY pr.created_at DESC
            LIMIT 1";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'token' => $token,
            'status' => 1
        ]);
        $user = $stmt->fetch();
        return $user ?: null;
    } catch (PDOException $e) {
        error_log('getUserByResetToken error: ' . $e->getMessage());
        return null;
    }
}

/**
 * Log an admin action
 */
function logAdminAction($adminId, $action, $ip) {
    $adminId = filter_var($adminId, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    $action = trim((string)$action);
    $ip = trim((string)$ip);

    if ($adminId === false || $action === '' || $ip === '') {
        return false;
    }

    $sql = "INSERT INTO admin_logs (admin_id, action, ip_address, created_at)
            VALUES (:admin_id, :action, :ip_address, NOW())";

    try {
        $pdo = getDBConnection();
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([
            'admin_id' => $adminId,
            'action' => $action,
            'ip_address' => $ip
        ]);
    } catch (PDOException $e) {
        error_log('logAdminAction error: ' . $e->getMessage());
        return false;
    }
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
            'image' => 'gallery1.jpg',
            'category' => 'events',
            'created_at' => '2024-01-20 10:00:00'
        ],
        [
            'id' => 2,
            'title' => 'Meeting with State Officials',
            'description' => 'Delegation meeting with state government officials',
            'image' => 'gallery2.jpg',
            'category' => 'meetings',
            'created_at' => '2024-02-15 11:30:00'
        ],
        [
            'id' => 3,
            'title' => 'GST Workshop Session',
            'description' => 'Interactive GST training workshop',
            'image' => 'gallery3.jpg',
            'category' => 'workshops',
            'created_at' => '2024-03-05 09:00:00'
        ],
        [
            'id' => 4,
            'title' => 'Award Ceremony',
            'description' => 'Recognition ceremony for outstanding traders',
            'image' => 'gallery4.jpg',
            'category' => 'awards',
            'created_at' => '2024-03-20 16:00:00'
        ],
        [
            'id' => 5,
            'title' => 'Business Networking Event',
            'description' => 'Networking session with local business owners',
            'image' => 'gallery5.jpg',
            'category' => 'events',
            'created_at' => '2024-03-25 14:30:00'
        ],
        [
            'id' => 6,
            'title' => 'Press Conference',
            'description' => 'Media briefing on trade policy reforms',
            'image' => 'gallery6.jpg',
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
            'image' => 'news1.jpg',
            'published_date' => '2026-04-01',
            'created_at' => '2026-04-01 10:00:00'
        ],
        [
            'id' => 2,
            'title' => 'GST Exemption Limit Raised',
            'content' => 'Government increases GST exemption limit to Rs 40 lakhs, benefiting thousands of small traders across the state.',
            'image' => 'news2.jpg',
            'published_date' => '2026-03-28',
            'created_at' => '2026-03-28 09:30:00'
        ],
        [
            'id' => 3,
            'title' => 'Digital Payment Incentives Announced',
            'content' => 'New incentive scheme for businesses adopting digital payment systems, promoting cashless economy.',
            'image' => 'news3.jpg',
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
    $stats = [
        'total_members' => 0,
        'total_awards' => 0,
        'total_events' => 0,
        'active_officials' => 0,
        'years_active' => 15
    ];

    try {
        $pdo = getDBConnection();
    } catch (PDOException $e) {
        error_log('getStatistics connection error: ' . $e->getMessage());
        return $stats;
    }

    $getCount = function($sql, $params = []) use ($pdo) {
        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            $row = $stmt->fetch();
            return isset($row['total']) ? (int)$row['total'] : 0;
        } catch (PDOException $e) {
            error_log('getStatistics query error: ' . $e->getMessage());
            return 0;
        }
    };

    $stats['total_members'] = $getCount(
        "SELECT COUNT(*) AS total FROM users WHERE status = :status",
        [
            'status' => 0
        ]
    );

    $stats['total_events'] = $getCount(
        "SELECT COUNT(*) AS total FROM events"
    );

    $stats['total_awards'] = $getCount(
        "SELECT COUNT(*) AS total FROM gallery WHERE category = :category",
        [
            'category' => 'awards'
        ]
    );

    $stats['active_officials'] = $getCount(
        "SELECT COUNT(*) AS total FROM users WHERE status = :status",
        [
            'status' => 0
        ]
    );

    return $stats;
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
            'image' => 'testimonial1.jpg'
        ],
        [
            'id' => 2,
            'name' => 'Sunita Verma',
            'business' => 'Retail Store Owner',
            'location' => 'Lucknow',
            'message' => 'The workshops and training programs have helped me modernize my business. I am now accepting digital payments and have seen a 40% increase in sales.',
            'rating' => 5,
            'image' => 'testimonial2.jpg'
        ],
        [
            'id' => 3,
            'name' => 'Amit Singh',
            'business' => 'Electronics Dealer',
            'location' => 'Varanasi',
            'message' => 'Being part of this mandal has given me access to networking opportunities and valuable business insights. Highly recommended for all traders.',
            'rating' => 5,
            'image' => 'testimonial3.jpg'
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
