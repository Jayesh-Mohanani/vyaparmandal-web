<?php
$heroSlides = [
    [
        'image' => asset('images/testing images/test-image-1.png'),
        'eyebrow' => 'Community in motion',
        'title' => 'Empowering traders across Uttar Pradesh',
        'text' => 'Join hands with ' . APP_NAME . ' to strengthen the voice of traders and build a prosperous business community.',
        'primary' => ['label' => 'Join Now', 'url' => url('/membership')],
        'secondary' => ['label' => 'Learn More', 'url' => url('/about')],
        'accent' => 'from-[#23303b] via-[#1f2937] to-[#111827]'
    ],
    [
        'image' => asset('images/testing images/test-image-2.png'),
        'eyebrow' => 'Events and outreach',
        'title' => 'Trade policy advocacy and business support',
        'text' => 'We fight for fair policies, GST reforms, and better opportunities for traders and small businesses.',
        'primary' => ['label' => 'View Events', 'url' => url('/events')],
        'secondary' => ['label' => 'Contact Us', 'url' => url('/contact')],
        'accent' => 'from-[#1f2937] via-[#0f172a] to-[#111827]'
    ],
    [
        'image' => asset('images/testing images/test-image-3.png'),
        'eyebrow' => 'Training and growth',
        'title' => 'Digital training and skill development',
        'text' => 'Modernize your business with workshops on digital payments, e-commerce, and GST compliance.',
        'primary' => ['label' => 'View Programs', 'url' => url('/events')],
        'secondary' => ['label' => 'Gallery', 'url' => url('/gallery')],
        'accent' => 'from-[#312e81] via-[#1e3a8a] to-[#0f172a]'
    ],
];
?>

<section class="hero-section hero-section--image-carousel">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="7000" data-bs-pause="false">
        <div class="hero-carousel-progress" aria-hidden="true">
            <span id="heroCarouselProgress" class="hero-carousel-progress__bar"></span>
        </div>

        <div class="carousel-indicators">
            <?php foreach ($heroSlides as $index => $slide): ?>
                <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
            <?php endforeach; ?>
        </div>

        <div class="carousel-inner">
            <?php foreach ($heroSlides as $index => $slide): ?>
                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <div class="hero-slide hero-slide--image bg-gradient-dark">
                        <div class="container">
                            <div class="row align-items-center hero-content-row py-5">
                                <div class="col-lg-6 text-white mb-4 mb-lg-0">
                                    <span class="hero-eyebrow d-inline-block mb-3"><?php echo $slide['eyebrow']; ?></span>
                                    <h1 class="display-4 fw-bold mb-4"><?php echo $slide['title']; ?></h1>
                                    <p class="lead mb-4 hero-copy"><?php echo $slide['text']; ?></p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="<?php echo $slide['primary']['url']; ?>" class="btn btn-primary btn-lg">
                                            <i class="bi bi-arrow-right-circle-fill me-2"></i><?php echo $slide['primary']['label']; ?>
                                        </a>
                                        <a href="<?php echo $slide['secondary']['url']; ?>" class="btn btn-outline-light btn-lg">
                                            <?php echo $slide['secondary']['label']; ?>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="hero-image-frame">
                                        <img src="<?php echo $slide['image']; ?>"
                                             alt="<?php echo htmlspecialchars($slide['title']); ?>"
                                             class="img-fluid hero-image"
                                             <?php echo $index === 0 ? 'fetchpriority="high"' : 'loading="lazy" decoding="async"'; ?>>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>
