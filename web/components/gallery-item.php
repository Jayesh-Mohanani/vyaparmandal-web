<?php
/**
 * Gallery Item Component
 * Reusable component for displaying gallery images
 *
 * Required variables:
 * - $item: Gallery item data array
 */

if (!isset($item)) {
    return;
}

$itemImage = !empty($item['image']) ?
    asset('images/gallery/' . $item['image']) :
    'https://via.placeholder.com/400x300?text=Gallery+Image';
?>

<div class="gallery-item col-lg-4 col-md-6 mb-4">
    <div class="card h-100 border-0 shadow-sm hover-zoom overflow-hidden">
        <div class="position-relative">
            <img src="<?php echo $itemImage; ?>"
                 class="card-img-top gallery-image"
                 alt="<?php echo htmlspecialchars($item['title']); ?>"
                 style="height: 250px; object-fit: cover; cursor: pointer;"
                 data-bs-toggle="modal"
                 data-bs-target="#galleryModal<?php echo $item['id']; ?>">

            <!-- Overlay on Hover -->
            <div class="gallery-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center">
                <i class="bi bi-zoom-in text-white fs-1"></i>
            </div>

            <!-- Category Badge -->
            <?php if (!empty($item['category'])): ?>
            <span class="position-absolute top-0 start-0 m-2 badge bg-primary">
                <?php echo ucfirst($item['category']); ?>
            </span>
            <?php endif; ?>
        </div>

        <div class="card-body">
            <h6 class="card-title fw-bold mb-2">
                <?php echo htmlspecialchars($item['title']); ?>
            </h6>
            <?php if (!empty($item['description'])): ?>
            <p class="card-text text-muted small">
                <?php echo truncate(htmlspecialchars($item['description']), 80); ?>
            </p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Gallery Modal for Full View -->
<div class="modal fade" id="galleryModal<?php echo $item['id']; ?>" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title"><?php echo htmlspecialchars($item['title']); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-0">
                <img src="<?php echo $itemImage; ?>"
                     class="img-fluid w-100"
                     alt="<?php echo htmlspecialchars($item['title']); ?>">
            </div>
            <?php if (!empty($item['description'])): ?>
            <div class="modal-footer border-0 justify-content-start">
                <p class="text-muted mb-0"><?php echo htmlspecialchars($item['description']); ?></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    .hover-zoom {
        transition: transform 0.3s ease;
    }

    .hover-zoom:hover {
        transform: scale(1.05);
    }

    .gallery-overlay {
        background: rgba(0, 0, 0, 0.6);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .gallery-item:hover .gallery-overlay {
        opacity: 1;
    }

    .gallery-image {
        transition: transform 0.5s ease;
    }

    .gallery-item:hover .gallery-image {
        transform: scale(1.1);
    }
</style>
