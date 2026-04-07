<?php
/**
 * Events Listing Page
 * Display all events with filtering options
 */
?>

<!-- Page Header -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Events</h1>
                <p class="lead">
                    Workshops, conferences, and networking opportunities for traders
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Events Section -->
<section class="py-5">
    <div class="container">
        <!-- Filter Tabs -->
        <div class="mb-5">
            <ul class="nav nav-pills justify-content-center" id="eventTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="pill" data-bs-target="#all" type="button">
                        All Events
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="upcoming-tab" data-bs-toggle="pill" data-bs-target="#upcoming" type="button">
                        Upcoming
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="completed-tab" data-bs-toggle="pill" data-bs-target="#completed" type="button">
                        Completed
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="eventTabsContent">
            <!-- All Events -->
            <div class="tab-pane fade show active" id="all" role="tabpanel">
                <div class="row g-4">
                    <?php if (!empty($events)): ?>
                        <?php foreach ($events as $event): ?>
                            <div class="col-lg-4 col-md-6">
                                <?php require __DIR__ . '/../../components/event-card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-calendar-x text-muted display-icon-xl"></i>
                            <p class="text-muted mt-3">No events available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="tab-pane fade" id="upcoming" role="tabpanel">
                <div class="row g-4">
                    <?php
                    $upcomingEvents = array_filter($events, fn($e) => $e['status'] === 'upcoming');
                    if (!empty($upcomingEvents)): ?>
                        <?php foreach ($upcomingEvents as $event): ?>
                            <div class="col-lg-4 col-md-6">
                                <?php require __DIR__ . '/../../components/event-card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-calendar-x text-muted display-icon-xl"></i>
                            <p class="text-muted mt-3">No upcoming events at the moment</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Completed Events -->
            <div class="tab-pane fade" id="completed" role="tabpanel">
                <div class="row g-4">
                    <?php
                    $completedEvents = array_filter($events, fn($e) => $e['status'] === 'completed');
                    if (!empty($completedEvents)): ?>
                        <?php foreach ($completedEvents as $event): ?>
                            <div class="col-lg-4 col-md-6">
                                <?php require __DIR__ . '/../../components/event-card.php'; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-calendar-check text-muted display-icon-xl"></i>
                            <p class="text-muted mt-3">No completed events</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Want to Attend Our Events?</h2>
        <p class="lead text-muted mb-4">
            Become a member to get exclusive access to all our workshops, conferences, and networking events
        </p>
        <a href="<?php echo url('/membership'); ?>" class="btn btn-primary btn-lg">
            <i class="bi bi-person-plus-fill me-2"></i>Join Now
        </a>
    </div>
</section>
