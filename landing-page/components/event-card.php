<?php
/**
 * Event Card Component
 * Reusable component for displaying event information
 *
 * Required variables:
 * - $event: Event data array
 */

if (!isset($event)) {
    return;
}

$eventImage = !empty($event['image']) ?
    asset('images/events/' . $event['image']) :
    'https://via.placeholder.com/400x300?text=Event+Image';

$statusClass = match($event['status']) {
    'upcoming' => 'bg-success',
    'ongoing' => 'bg-warning',
    'completed' => 'bg-secondary',
    default => 'bg-primary'
};

$statusText = ucfirst($event['status']);
?>

<div class="card h-100 shadow-sm hover-lift transition">
    <!-- Event Image -->
    <div class="position-relative overflow-hidden">
        <img src="<?php echo $eventImage; ?>"
             class="card-img-top"
             alt="<?php echo htmlspecialchars($event['title']); ?>"
             style="height: 200px; object-fit: cover;">

        <!-- Status Badge -->
        <span class="position-absolute top-0 end-0 m-2 badge <?php echo $statusClass; ?> text-white">
            <?php echo $statusText; ?>
        </span>
    </div>

    <!-- Event Details -->
    <div class="card-body d-flex flex-column">
        <h5 class="card-title fw-bold">
            <?php echo htmlspecialchars($event['title']); ?>
        </h5>

        <p class="card-text text-muted small flex-grow-1">
            <?php echo truncate(htmlspecialchars($event['description']), 120); ?>
        </p>

        <!-- Event Meta Info -->
        <div class="mb-3">
            <div class="d-flex align-items-center text-muted small mb-2">
                <i class="bi bi-calendar-event me-2 text-primary"></i>
                <span><?php echo formatDate($event['event_date'], 'd M Y'); ?></span>
            </div>

            <div class="d-flex align-items-center text-muted small">
                <i class="bi bi-geo-alt me-2 text-danger"></i>
                <span><?php echo htmlspecialchars($event['location']); ?></span>
            </div>
        </div>

        <!-- View Details Button -->
        <a href="<?php echo url('/events/' . $event['id']); ?>" class="btn btn-outline-primary w-100">
            <i class="bi bi-info-circle me-1"></i>View Details
        </a>
    </div>
</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .transition {
        transition: all 0.3s ease;
    }
</style>
