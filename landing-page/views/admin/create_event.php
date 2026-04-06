<?php
/**
 * Create Event Page
 * Form to create a new event
 */
?>

<!-- Page Header -->
<section class="py-4 bg-light border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0">
                    <i class="bi bi-plus-circle me-2"></i>Create New Event
                </h2>
                <p class="text-muted mb-0">Add a new event to the calendar</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="<?php echo url('/admin/events'); ?>" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Back to Events
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Create Event Form -->
<section class="py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="<?php echo url('/admin/events/store'); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <!-- Event Title -->
                                <div class="col-12">
                                    <label for="title" class="form-label">Event Title <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control <?php echo getError('title') ? 'is-invalid' : ''; ?>"
                                           id="title"
                                           name="title"
                                           value="<?php echo old('title'); ?>"
                                           required>
                                    <?php if ($error = getError('title')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Event Description -->
                                <div class="col-12">
                                    <label for="description" class="form-label">Event Description <span class="text-danger">*</span></label>
                                    <textarea class="form-control <?php echo getError('description') ? 'is-invalid' : ''; ?>"
                                              id="description"
                                              name="description"
                                              rows="5"
                                              required><?php echo old('description'); ?></textarea>
                                    <?php if ($error = getError('description')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Event Date -->
                                <div class="col-md-6">
                                    <label for="event_date" class="form-label">Event Date <span class="text-danger">*</span></label>
                                    <input type="date"
                                           class="form-control <?php echo getError('event_date') ? 'is-invalid' : ''; ?>"
                                           id="event_date"
                                           name="event_date"
                                           value="<?php echo old('event_date'); ?>"
                                           required>
                                    <?php if ($error = getError('event_date')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Event Location -->
                                <div class="col-md-6">
                                    <label for="location" class="form-label">Location <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control <?php echo getError('location') ? 'is-invalid' : ''; ?>"
                                           id="location"
                                           name="location"
                                           value="<?php echo old('location'); ?>"
                                           required>
                                    <?php if ($error = getError('location')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Event Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="upcoming" selected>Upcoming</option>
                                        <option value="ongoing">Ongoing</option>
                                        <option value="completed">Completed</option>
                                    </select>
                                </div>

                                <!-- Event Image -->
                                <div class="col-md-6">
                                    <label for="image" class="form-label">Event Image</label>
                                    <input type="file"
                                           class="form-control <?php echo getError('image') ? 'is-invalid' : ''; ?>"
                                           id="image"
                                           name="image"
                                           accept="image/*"
                                           data-preview="imagePreview">
                                    <?php if ($error = getError('image')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Image Preview -->
                                <div class="col-12">
                                    <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail" style="display: none; max-width: 300px;">
                                </div>

                                <!-- Submit Buttons -->
                                <div class="col-12">
                                    <hr>
                                    <button type="submit" class="btn btn-primary me-2">
                                        <i class="bi bi-check-circle me-2"></i>Create Event
                                    </button>
                                    <a href="<?php echo url('/admin/events'); ?>" class="btn btn-secondary">
                                        <i class="bi bi-x-circle me-2"></i>Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
