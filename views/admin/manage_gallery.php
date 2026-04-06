<?php
/**
 * Manage Gallery Page
 * Admin view for gallery management
 */
?>

<!-- Page Header -->
<section class="py-4 bg-light border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0">
                    <i class="bi bi-images me-2"></i>Manage Gallery
                </h2>
                <p class="text-muted mb-0">Upload and manage gallery images</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="<?php echo url('/admin/gallery/upload'); ?>" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Upload New Image
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid -->
<section class="py-4">
    <div class="container-fluid">
        <div class="row g-4">
            <?php if (!empty($gallery)): ?>
                <?php foreach ($gallery as $item): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card border-0 shadow-sm h-100">
                            <img src="https://via.placeholder.com/400x300?text=<?php echo urlencode($item['title']); ?>"
                                 class="card-img-top"
                                 alt="<?php echo htmlspecialchars($item['title']); ?>"
                                 style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h6 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h6>
                                <p class="card-text small text-muted">
                                    <?php echo truncate(htmlspecialchars($item['description']), 60); ?>
                                </p>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo url('/admin/gallery/delete/' . $item['id']); ?>"
                                       class="btn btn-sm btn-danger w-100"
                                       data-confirm-delete>
                                        <i class="bi bi-trash me-1"></i>Delete
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer bg-light border-0">
                                <small class="text-muted">
                                    <i class="bi bi-tag me-1"></i><?php echo ucfirst($item['category']); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12 text-center py-5">
                    <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                    <p class="text-muted mt-3">No images in gallery</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
