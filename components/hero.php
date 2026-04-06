<!-- Hero Section / Banner Slider -->
<section class="hero-section">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>

        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="hero-slide" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-8 text-white">
                                <h1 class="display-3 fw-bold mb-4 animate__animated animate__fadeInUp">
                                    Empowering Traders<br>
                                    Across Uttar Pradesh
                                </h1>
                                <p class="lead mb-4 animate__animated animate__fadeInUp animate__delay-1s">
                                    Join hands with <?php echo APP_NAME; ?> to strengthen the voice of traders
                                    and build a prosperous business community.
                                </p>
                                <div class="animate__animated animate__fadeInUp animate__delay-2s">
                                    <a href="<?php echo url('/membership'); ?>" class="btn btn-warning btn-lg me-3 mb-2">
                                        <i class="bi bi-person-plus-fill me-2"></i>Join Now
                                    </a>
                                    <a href="<?php echo url('/about'); ?>" class="btn btn-outline-light btn-lg mb-2">
                                        <i class="bi bi-info-circle me-2"></i>Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-8 text-white">
                                <h1 class="display-3 fw-bold mb-4">
                                    Trade Policy Advocacy<br>
                                    & Business Support
                                </h1>
                                <p class="lead mb-4">
                                    We fight for fair policies, GST reforms, and better business opportunities for traders.
                                </p>
                                <div>
                                    <a href="<?php echo url('/events'); ?>" class="btn btn-light btn-lg me-3 mb-2">
                                        <i class="bi bi-calendar-event me-2"></i>View Events
                                    </a>
                                    <a href="<?php echo url('/contact'); ?>" class="btn btn-outline-light btn-lg mb-2">
                                        <i class="bi bi-envelope me-2"></i>Contact Us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item">
                <div class="hero-slide" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                    <div class="container">
                        <div class="row align-items-center min-vh-75">
                            <div class="col-lg-8 text-white">
                                <h1 class="display-3 fw-bold mb-4">
                                    Digital Training &<br>
                                    Skill Development
                                </h1>
                                <p class="lead mb-4">
                                    Modernize your business with our comprehensive training programs on digital payments,
                                    e-commerce, and GST compliance.
                                </p>
                                <div>
                                    <a href="<?php echo url('/events'); ?>" class="btn btn-warning btn-lg me-3 mb-2">
                                        <i class="bi bi-mortarboard-fill me-2"></i>View Programs
                                    </a>
                                    <a href="<?php echo url('/gallery'); ?>" class="btn btn-outline-light btn-lg mb-2">
                                        <i class="bi bi-images me-2"></i>Gallery
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Carousel Controls -->
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

<style>
    .min-vh-75 {
        min-height: 75vh;
    }

    .hero-slide {
        min-height: 75vh;
        display: flex;
        align-items: center;
        position: relative;
    }

    .hero-section .carousel-item {
        transition: transform 1s ease-in-out;
    }
</style>
