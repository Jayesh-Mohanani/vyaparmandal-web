<?php
/**
 * Gallery Page
 * Display photo gallery with categories
 */
?>

<!-- Page Header -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Photo Gallery</h1>
                <p class="lead">
                    Glimpses from our events, meetings, and activities
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5">
    <div class="container">
        <!-- Category Filter -->
        <div class="mb-5">
            <ul class="nav nav-pills justify-content-center flex-wrap" id="galleryTabs" role="tablist">
                <li class="nav-item mb-2" role="presentation">
                    <button class="nav-link active" id="all-gallery-tab" data-bs-toggle="pill" data-bs-target="#all-gallery" type="button">
                        All Photos
                    </button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="nav-link" id="events-gallery-tab" data-bs-toggle="pill" data-bs-target="#events-gallery" type="button">
                        Events
                    </button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="nav-link" id="meetings-gallery-tab" data-bs-toggle="pill" data-bs-target="#meetings-gallery" type="button">
                        Meetings
                    </button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="nav-link" id="workshops-gallery-tab" data-bs-toggle="pill" data-bs-target="#workshops-gallery" type="button">
                        Workshops
                    </button>
                </li>
                <li class="nav-item mb-2" role="presentation">
                    <button class="nav-link" id="awards-gallery-tab" data-bs-toggle="pill" data-bs-target="#awards-gallery" type="button">
                        Awards
                    </button>
                </li>
            </ul>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="galleryTabsContent">
            <!-- All Photos -->
            <div class="tab-pane fade show active" id="all-gallery" role="tabpanel">
                <div class="row g-4">
                    <?php if (!empty($gallery)): ?>
                        <?php foreach ($gallery as $item): ?>
                            <?php require __DIR__ . '/../../components/gallery-item.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-3">No images available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Events Photos -->
            <div class="tab-pane fade" id="events-gallery" role="tabpanel">
                <div class="row g-4">
                    <?php
                    $eventPhotos = array_filter($gallery, fn($item) => $item['category'] === 'events');
                    if (!empty($eventPhotos)): ?>
                        <?php foreach ($eventPhotos as $item): ?>
                            <?php require __DIR__ . '/../../components/gallery-item.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-3">No event photos available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Meetings Photos -->
            <div class="tab-pane fade" id="meetings-gallery" role="tabpanel">
                <div class="row g-4">
                    <?php
                    $meetingPhotos = array_filter($gallery, fn($item) => $item['category'] === 'meetings');
                    if (!empty($meetingPhotos)): ?>
                        <?php foreach ($meetingPhotos as $item): ?>
                            <?php require __DIR__ . '/../../components/gallery-item.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-3">No meeting photos available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Workshops Photos -->
            <div class="tab-pane fade" id="workshops-gallery" role="tabpanel">
                <div class="row g-4">
                    <?php
                    $workshopPhotos = array_filter($gallery, fn($item) => $item['category'] === 'workshops');
                    if (!empty($workshopPhotos)): ?>
                        <?php foreach ($workshopPhotos as $item): ?>
                            <?php require __DIR__ . '/../../components/gallery-item.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-3">No workshop photos available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Awards Photos -->
            <div class="tab-pane fade" id="awards-gallery" role="tabpanel">
                <div class="row g-4">
                    <?php
                    $awardPhotos = array_filter($gallery, fn($item) => $item['category'] === 'awards');
                    if (!empty($awardPhotos)): ?>
                        <?php foreach ($awardPhotos as $item): ?>
                            <?php require __DIR__ . '/../../components/gallery-item.php'; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-12 text-center py-5">
                            <i class="bi bi-images text-muted" style="font-size: 4rem;"></i>
                            <p class="text-muted mt-3">No award photos available</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
