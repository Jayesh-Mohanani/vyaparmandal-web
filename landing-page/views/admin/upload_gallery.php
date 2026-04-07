<?php /**Upload Gallery Page*/ ?>
<section class="py-4 bg-light border-bottom admin-page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0"><i class="bi bi-upload me-2"></i>Upload to Gallery</h2>
                <p class="text-muted mb-0">Add new images to the gallery</p>
            </div>
            <div class="col-md-6">
                <div class="admin-page-actions">
                    <a href="<?php echo url('/admin'); ?>" class="admin-back-link">
                        <i class="bi bi-speedometer2"></i>Dashboard
                    </a>
                    <a href="<?php echo url('/admin/gallery'); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to Gallery
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="<?php echo url('/admin/gallery/store'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category">
                                    <option value="events">Events</option>
                                    <option value="meetings">Meetings</option>
                                    <option value="workshops">Workshops</option>
                                    <option value="awards">Awards</option>
                                    <option value="press">Press</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required data-preview="imagePreview">
                            </div>
                            <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail mb-3 image-preview">
                            <hr>
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-upload me-2"></i>Upload</button>
                            <a href="<?php echo url('/admin/gallery'); ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
