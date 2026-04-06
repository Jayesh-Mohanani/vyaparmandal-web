<?php
/**
 * Edit Event Page
 * Form to edit an existing event
 */
?>

<!-- Page Header -->
<section class="py-4 bg-light border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0">
                    <i class="bi bi-pencil me-2"></i>Edit Event
                </h2>
                <p class="text-muted mb-0">Modify event details</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="<?php echo url('/admin/events'); ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Events
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Edit Event Form -->
<section class="py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="<?php echo url('/admin/events/update/' . $event['id']); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="title" class="form-label">Event Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($event['title']); ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                   <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($event['description']); ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="event_date" class="form-label">Event Date</label>
                                    <input type="date" class="form-control" id="event_date" name="event_date" value="<?php echo $event['event_date']; ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($event['location']); ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="upcoming" <?php echo $event['status'] === 'upcoming' ? 'selected' : ''; ?>>Upcoming</option>
                                        <option value="ongoing" <?php echo $event['status'] === 'ongoing' ? 'selected' : ''; ?>>Ongoing</option>
                                        <option value="completed" <?php echo $event['status'] === 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Event Image</label>
                                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                                </div>
                                <div class="col-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="bi bi-save me-2"></i>Update Event
                                    </button>
                                    <a href="<?php echo url('/admin/events'); ?>" class="btn btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
