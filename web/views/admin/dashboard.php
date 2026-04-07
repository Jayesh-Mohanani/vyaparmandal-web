<?php
/**
 * Admin Dashboard
 * Overview and statistics
 */
?>

<!-- Dashboard Header -->
<section class="py-4 bg-light border-bottom admin-page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </h2>
                <p class="text-muted mb-0">Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</p>
            </div>
            <div class="col-md-6 text-md-end">
                <span class="text-muted">
                    <i class="bi bi-calendar3 me-1"></i>
                    <?php echo date('l, F j, Y'); ?>
                </span>
            </div>
        </div>
    </div>
</section>

<!-- Dashboard Content -->
<section class="py-4 admin-dashboard-section">
    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="row g-4 mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm stat-card success h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Members</p>
                                <h3 class="mb-0 fw-bold"><?php echo number_format($stats['total_members']); ?></h3>
                            </div>
                            <div>
                                <i class="bi bi-people-fill text-success display-icon-lg icon-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm stat-card warning h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Total Events</p>
                                <h3 class="mb-0 fw-bold"><?php echo number_format($stats['total_events']); ?></h3>
                            </div>
                            <div>
                                <i class="bi bi-calendar-event-fill text-warning display-icon-lg icon-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm stat-card danger h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">Awards Won</p>
                                <h3 class="mb-0 fw-bold"><?php echo number_format($stats['total_awards']); ?></h3>
                            </div>
                            <div>
                                <i class="bi bi-award-fill text-danger display-icon-lg icon-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card border-0 shadow-sm stat-card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-1">New Messages</p>
                                <h3 class="mb-0 fw-bold"><?php echo count($recentMessages); ?></h3>
                            </div>
                            <div>
                                <i class="bi bi-envelope-fill text-primary display-icon-lg icon-muted"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <!-- Recent Events -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm h-100 dashboard-panel dashboard-events-panel">
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center dashboard-panel__header">
                        <h5 class="mb-0">
                            <i class="bi bi-calendar-event me-2"></i>Recent Events
                        </h5>
                        <a href="<?php echo url('/admin/events'); ?>" class="btn btn-sm btn-outline-primary dashboard-link-btn">
                            View All
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0 dashboard-table">
                                <thead class="table-light dashboard-table-head">
                                    <tr>
                                        <th>Event Name</th>
                                        <th>Date</th>
                                        <th>Location</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($recentEvents)): ?>
                                        <?php foreach ($recentEvents as $event): ?>
                                            <tr>
                                                <td>
                                                    <strong><?php echo htmlspecialchars($event['title']); ?></strong>
                                                </td>
                                                <td>
                                                    <small><?php echo formatDate($event['event_date']); ?></small>
                                                </td>
                                                <td>
                                                    <small class="text-muted"><?php echo htmlspecialchars($event['location']); ?></small>
                                                </td>
                                                <td>
                                                    <span class="badge bg-<?php echo $event['status'] === 'upcoming' ? 'success' : 'secondary'; ?>">
                                                        <?php echo ucfirst($event['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo url('/admin/events/edit/' . $event['id']); ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="text-center text-muted py-4">No events found</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions & Recent Messages -->
            <div class="col-lg-4">
                <!-- Quick Actions -->
                <div class="card border-0 shadow-sm mb-4 dashboard-panel dashboard-quick-panel">
                    <div class="card-header bg-white border-0 dashboard-panel__header">
                        <h5 class="mb-0">
                            <i class="bi bi-lightning-fill me-2"></i>Quick Actions
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="d-grid gap-2 dashboard-quick-actions">
                            <a href="<?php echo url('/admin/events/create'); ?>" class="btn btn-primary dashboard-action-btn dashboard-action-btn--indigo">
                                <i class="bi bi-plus-circle me-2"></i>Add New Event
                            </a>
                            <a href="<?php echo url('/admin/gallery/upload'); ?>" class="btn btn-success dashboard-action-btn dashboard-action-btn--green">
                                <i class="bi bi-image me-2"></i>Upload to Gallery
                            </a>
                            <a href="<?php echo url('/admin/users'); ?>" class="btn btn-info text-white dashboard-action-btn dashboard-action-btn--cyan">
                                <i class="bi bi-people me-2"></i>Manage Users
                            </a>
                            <a href="<?php echo url('/admin/messages'); ?>" class="btn btn-warning dashboard-action-btn dashboard-action-btn--gold">
                                <i class="bi bi-envelope me-2"></i>View Messages
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Messages -->
                <div class="card border-0 shadow-sm dashboard-panel dashboard-messages-panel">
                    <div class="card-header bg-white border-0 d-flex justify-content-between align-items-center dashboard-panel__header">
                        <h5 class="mb-0">
                            <i class="bi bi-envelope me-2"></i>Recent Messages
                        </h5>
                        <a href="<?php echo url('/admin/messages'); ?>" class="btn btn-sm btn-outline-primary dashboard-link-btn">
                            View All
                        </a>
                    </div>
                    <div class="card-body p-0">
                        <?php if (!empty($recentMessages)): ?>
                            <div class="list-group list-group-flush">
                                <?php foreach (array_slice($recentMessages, 0, 5) as $message): ?>
                                    <a href="<?php echo url('/admin/messages/' . $message['id']); ?>" class="list-group-item list-group-item-action dashboard-message-item">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1"><?php echo htmlspecialchars($message['name']); ?></h6>
                                            <small class="text-muted"><?php echo formatDate($message['created_at'], 'd M'); ?></small>
                                        </div>
                                        <p class="mb-1 small text-muted">
                                            <?php echo truncate(htmlspecialchars($message['message']), 60); ?>
                                        </p>
                                        <small class="text-muted"><?php echo htmlspecialchars($message['email']); ?></small>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="p-4 text-center text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                No messages yet
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
