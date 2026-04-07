<?php
/**
 * Manage Events Page
 * Admin view for event management
 */
?>

<!-- Page Header -->
<section class="py-4 bg-light border-bottom admin-page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0">
                    <i class="bi bi-calendar-event me-2"></i>Manage Events
                </h2>
                <p class="text-muted mb-0">Create, edit, and manage all events</p>
            </div>
            <div class="col-md-6">
                <div class="admin-page-actions">
                    <a href="<?php echo url('/admin'); ?>" class="admin-back-link">
                        <i class="bi bi-speedometer2"></i>Dashboard
                    </a>
                    <a href="<?php echo url('/admin/events/create'); ?>" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>Add New Event
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Events List -->
<section class="py-4">
    <div class="container-fluid">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="w-5">ID</th>
                                <th class="w-30">Event Name</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th class="w-15">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($events)): ?>
                                <?php foreach ($events as $event): ?>
                                    <tr>
                                        <td><?php echo $event['id']; ?></td>
                                        <td>
                                            <strong><?php echo htmlspecialchars($event['title']); ?></strong>
                                            <br>
                                            <small class="text-muted">
                                                <?php echo truncate(htmlspecialchars($event['description']), 80); ?>
                                            </small>
                                        </td>
                                        <td>
                                           <?php echo formatDate($event['event_date']); ?>
                                        </td>
                                        <td><?php echo htmlspecialchars($event['location']); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo $event['status'] === 'upcoming' ? 'success' : ($event['status'] === 'ongoing' ? 'warning' : 'secondary'); ?>">
                                                <?php echo ucfirst($event['status']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo url('/events/' . $event['id']); ?>" class="btn btn-outline-info" target="_blank" title="View">
                                                    <i class="bi bi-eye"></i>
                                                </a>
                                                <a href="<?php echo url('/admin/events/edit/' . $event['id']); ?>" class="btn btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a href="<?php echo url('/admin/events/delete/' . $event['id']); ?>" class="btn btn-outline-danger" data-confirm-delete title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-5">
                                        <i class="bi bi-calendar-x fs-1 d-block mb-3"></i>
                                        No events found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
