<?php
/**
 * Homepage
 * Main landing page with all sections
 */
?>

<!-- Hero Section -->
<?php require_once __DIR__ . '/../../components/hero.php'; ?>

<!-- Quick Access Cards -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100 hover-lift">
                    <div class="card-body p-4">
                        <i class="bi bi-people-fill text-primary" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 mb-3">Member List</h4>
                        <p class="text-muted">Browse our directory of registered members across Uttar Pradesh</p>
                        <a href="<?php echo url('/membership'); ?>" class="btn btn-outline-primary">View Members</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100 hover-lift">
                    <div class="card-body p-4">
                        <i class="bi bi-award-fill text-warning" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 mb-3">Officials List</h4>
                        <p class="text-muted">Meet our dedicated team of office bearers and executives</p>
                        <a href="<?php echo url('/about'); ?>" class="btn btn-outline-warning">View Officials</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center h-100 hover-lift">
                    <div class="card-body p-4">
                        <i class="bi bi-person-plus-fill text-success" style="font-size: 3rem;"></i>
                        <h4 class="mt-3 mb-3">Join as Member</h4>
                        <p class="text-muted">Become part of our growing community of traders and businesses</p>
                        <a href="<?php echo url('/membership'); ?>" class="btn btn-outline-success">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Preview Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="section-title">About Vyapar Mandal</h2>
                <p class="lead text-muted mb-4">
                    Empowering traders and businesses across Uttar Pradesh since <?php echo date('Y') - ($stats['years_active'] ?? 15); ?>
                </p>
                <p class="mb-4">
                    <?php echo APP_NAME; ?> is the largest and most influential trader organization in Uttar Pradesh.
                    We represent the interests of thousands of small and medium businesses, advocating for fair trade policies,
                    simplified taxation, and business-friendly regulations.
                </p>
                <p class="mb-4">
                    Our mission is to create a strong, unified voice for traders, provide valuable training and resources,
                    and foster a supportive business community that drives economic growth and prosperity.
                </p>
                <a href="<?php echo url('/about'); ?>" class="btn btn-primary">Learn More</a>
            </div>

            <div class="col-lg-6">
                <img src="https://via.placeholder.com/600x400?text=About+Vyapar+Mandal"
                     alt="About Vyapar Mandal"
                     class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['total_members']; ?>">0</span>
                    <div class="stat-label text-white-50">Total Members</div>
                </div>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['total_awards']; ?>">0</span>
                    <div class="stat-label text-white-50">Awards Won</div>
                </div>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['total_events']; ?>">0</span>
                    <div class="stat-label text-white-50">Events Organized</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['active_officials']; ?>">0</span>
                    <div class="stat-label text-white-50">Active Officials</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Upcoming Events Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Upcoming Events</h2>
            <p class="section-subtitle">Join us at our upcoming workshops, conferences, and networking events</p>
        </div>

        <div class="row g-4">
            <?php if (!empty($upcomingEvents)): ?>
                <?php foreach ($upcomingEvents as $event): ?>
                    <div class="col-lg-4 col-md-6">
                        <?php require __DIR__ . '/../../components/event-card.php'; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center">
                    <p class="text-muted">No upcoming events at the moment. Check back soon!</p>
                </div>
            <?php endif; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo url('/events'); ?>" class="btn btn-outline-primary btn-lg">View All Events</a>
        </div>
    </div>
</section>

<!-- Latest News Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Latest News & Updates</h2>
            <p class="section-subtitle">Stay informed about trade policies, achievements, and important announcements</p>
        </div>

        <div class="row g-4">
            <?php foreach ($latestNews as $news): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <img src="<?php echo !empty($news['image']) ? asset('images/news/' . $news['image']) : 'https://via.placeholder.com/400x250?text=' . urlencode($news['title']); ?>"
                             class="card-img-top"
                             alt="<?php echo htmlspecialchars($news['title']); ?>"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-2">
                                <small class="text-muted">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    <?php echo formatDate($news['published_date']); ?>
                                </small>
                            </div>
                            <h5 class="card-title"><?php echo htmlspecialchars($news['title']); ?></h5>
                            <p class="card-text text-muted">
                                <?php echo truncate(htmlspecialchars($news['content']), 120); ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Gallery Preview Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Photo Gallery</h2>
            <p class="section-subtitle">Glimpses from our events, meetings, and activities</p>
        </div>

        <div class="row g-4">
            <?php foreach (array_slice($gallery, 0, 6) as $item): ?>
                <?php require __DIR__ . '/../../components/gallery-item.php'; ?>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo url('/gallery'); ?>" class="btn btn-outline-primary btn-lg">View Full Gallery</a>
        </div>
    </div>
</section>

<!-- Demands & Achievements Section -->
<section class="py-5 bg-light" id="demands">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Our Demands & Achievements</h2>
            <p class="section-subtitle">Fighting for trader rights and celebrating our successes</p>
        </div>

        <div class="row g-4">
            <!-- Demands -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-danger text-white">
                        <h4 class="mb-0"><i class="bi bi-megaphone me-2"></i>Our Demands</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php foreach ($demandsAchievements['demands'] as $demand): ?>
                                <li class="mb-3">
                                    <i class="bi bi-check-circle-fill text-danger me-2"></i>
                                    <?php echo htmlspecialchars($demand); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0"><i class="bi bi-trophy me-2"></i>Our Achievements</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <?php foreach ($demandsAchievements['achievements'] as $achievement): ?>
                                <li class="mb-3">
                                    <i class="bi bi-award-fill text-success me-2"></i>
                                    <?php echo htmlspecialchars($achievement); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">What Our Members Say</h2>
            <p class="section-subtitle">Hear from traders who have benefited from our services</p>
        </div>

        <div class="row g-4">
            <?php foreach ($testimonials as $testimonial): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <div class="mb-3">
                                <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                                    <i class="bi bi-star-fill text-warning"></i>
                                <?php endfor; ?>
                            </div>
                            <p class="mb-4">"<?php echo htmlspecialchars($testimonial['message']); ?>"</p>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($testimonial['name']); ?>&size=60&background=random"
                                         class="rounded-circle"
                                         alt="<?php echo htmlspecialchars($testimonial['name']); ?>"
                                         width="60">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-0"><?php echo htmlspecialchars($testimonial['name']); ?></h6>
                                    <small class="text-muted">
                                        <?php echo htmlspecialchars($testimonial['business']); ?>,
                                        <?php echo htmlspecialchars($testimonial['location']); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container text-center">
        <h2 class="display-5 fw-bold mb-4">Ready to Join Our Community?</h2>
        <p class="lead mb-4">
            Become a member today and be part of the strongest trader organization in Uttar Pradesh
        </p>
        <a href="<?php echo url('/membership'); ?>" class="btn btn-warning btn-lg me-3">
            <i class="bi bi-person-plus-fill me-2"></i>Join Now
        </a>
        <a href="<?php echo url('/contact'); ?>" class="btn btn-outline-light btn-lg">
            <i class="bi bi-envelope me-2"></i>Contact Us
        </a>
    </div>
</section>
