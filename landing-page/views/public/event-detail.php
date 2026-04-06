<?php
/**
 * Event Detail Page
 * Display single event with full details
 */

$eventImage = !empty($event['image']) ?
    asset('images/events/' . $event['image']) :
    'https://via.placeholder.com/1200x600?text=Event+Image';
?>

<!-- Event Header -->
<section class="py-5 bg-dark text-white" style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo $eventImage; ?>'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="mb-3">
                    <span class="badge bg-<?php echo $event['status'] === 'upcoming' ? 'success' : 'secondary'; ?> px-3 py-2">
                        <?php echo ucfirst($event['status']); ?>
                    </span>
                </div>
                <h1 class="display-4 fw-bold mb-4"><?php echo htmlspecialchars($event['title']); ?></h1>
                <div class="d-flex flex-wrap gap-4 text-white-50">
                    <div>
                        <i class="bi bi-calendar-event me-2"></i>
                        <?php echo formatDate($event['event_date'], 'd F Y'); ?>
                    </div>
                    <div>
                        <i class="bi bi-geo-alt me-2"></i>
                        <?php echo htmlspecialchars($event['location']); ?>
                    </div>
                    <div>
                        <i class="bi bi-clock me-2"></i>
                        10:00 AM - 5:00 PM
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Event Details -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4">About This Event</h3>
                        <p class="text-muted lead">
                            <?php echo nl2br(htmlspecialchars($event['description'])); ?>
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Event Highlights</h3>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Expert speakers from the industry
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Interactive workshops and Q&A sessions
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Networking opportunities with fellow traders
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Certificates of participation
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Complimentary refreshments and lunch
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="mb-4">Who Should Attend?</h3>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-person-badge text-primary fs-4 mb-2"></i>
                                    <h6>Business Owners</h6>
                                    <p class="text-muted small mb-0">Small and medium business proprietors</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-shop text-success fs-4 mb-2"></i>
                                    <h6>Retailers</h6>
                                    <p class="text-muted small mb-0">Shop owners and retail merchants</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-briefcase text-warning fs-4 mb-2"></i>
                                    <h6>Wholesalers</h6>
                                    <p class="text-muted small mb-0">Wholesale traders and distributors</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="p-3 bg-light rounded">
                                    <i class="bi bi-people text-info fs-4 mb-2"></i>
                                    <h6>Trade Associations</h6>
                                    <p class="text-muted small mb-0">Representatives from trader groups</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 100px;">
                    <div class="card-body p-4">
                        <h5 class="mb-4">Event Information</h5>

                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Date & Time</h6>
                            <p class="mb-0">
                                <i class="bi bi-calendar-event me-2 text-primary"></i>
                                <?php echo formatDate($event['event_date'], 'd F Y'); ?>
                            </p>
                            <p class="mb-0">
                                <i class="bi bi-clock me-2 text-primary"></i>
                                10:00 AM - 5:00 PM
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Location</h6>
                            <p class="mb-0">
                                <i class="bi bi-geo-alt me-2 text-danger"></i>
                                <?php echo htmlspecialchars($event['location']); ?>
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-muted mb-2">Registration Fee</h6>
                            <p class="mb-0">
                                <i class="bi bi-currency-rupee me-2 text-success"></i>
                                Free for Members
                            </p>
                        </div>

                        <hr>

                        <?php if ($event['status'] === 'upcoming'): ?>
                            <a href="<?php echo url('/membership'); ?>" class="btn btn-primary w-100 mb-2">
                                <i class="bi bi-calendar-check me-2"></i>Register Now
                            </a>
                            <p class="text-muted small text-center mb-0">
                                Members get free access to all events
                            </p>
                        <?php else: ?>
                            <div class="alert alert-secondary text-center mb-0">
                                <i class="bi bi-check-circle me-2"></i>
                                This event has ended
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Share Section -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h6 class="mb-3">Share This Event</h6>
                        <div class="d-flex gap-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(url('/events/' . $event['id'])); ?>"
                               class="btn btn-outline-primary flex-fill"
                               target="_blank">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(url('/events/' . $event['id'])); ?>&text=<?php echo urlencode($event['title']); ?>"
                               class="btn btn-outline-info flex-fill"
                               target="_blank">
                                <i class="bi bi-twitter-x"></i>
                            </a>
                            <a href="https://wa.me/?text=<?php echo urlencode($event['title'] . ' - ' . url('/events/' . $event['id'])); ?>"
                               class="btn btn-outline-success flex-fill"
                               target="_blank">
                                <i class="bi bi-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Events -->
<?php if (!empty($relatedEvents)): ?>
<section class="py-5 bg-light">
    <div class="container">
        <h3 class="mb-4">Other Upcoming Events</h3>
        <div class="row g-4">
            <?php foreach ($relatedEvents as $relatedEvent): ?>
                <?php
                if ($relatedEvent['id'] !== $event['id']) {
                    $event = $relatedEvent;
                ?>
                    <div class="col-lg-4 col-md-6">
                        <?php require __DIR__ . '/../../components/event-card.php'; ?>
                    </div>
                <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
