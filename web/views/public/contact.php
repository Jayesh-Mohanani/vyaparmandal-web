<?php
/**
 * Contact Page
 * Contact form and information
 */
?>

<!-- Page Header -->
<section class="py-5 text-white page-hero-image page-hero-image--contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center py-4">
                <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                <p class="lead">
                    We're here to help. Reach out to us anytime
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-xl-10">
                <div class="mb-4 text-center">
                    <h3 class="mb-3">Get in Touch</h3>
                    <p class="text-muted mb-0">
                        Have questions or need assistance? Reach us through the details below.
                    </p>
                </div>

                <div class="row g-4 row-cols-1 row-cols-md-2 contact-card-grid">
                    <div class="col">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4 h-100">
                                <div class="d-flex align-items-start gap-3 h-100">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-geo-alt-fill text-primary fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Address</h6>
                                        <p class="text-muted mb-0">
                                            <?php echo CONTACT_ADDRESS; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4 h-100">
                                <div class="d-flex align-items-start gap-3 h-100">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-telephone-fill text-success fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Phone</h6>
                                        <p class="text-muted mb-0">
                                            <a href="tel:<?php echo str_replace([' ', '+', '-'], '', CONTACT_PHONE); ?>" class="text-decoration-none">
                                                <?php echo CONTACT_PHONE; ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4 h-100">
                                <div class="d-flex align-items-start gap-3 h-100">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-envelope-fill text-danger fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Email</h6>
                                        <p class="text-muted mb-0">
                                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="text-decoration-none">
                                                <?php echo CONTACT_EMAIL; ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4 h-100">
                                <div class="d-flex align-items-start gap-3 h-100">
                                    <div class="flex-shrink-0">
                                        <i class="bi bi-clock-fill text-warning fs-3"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1">Office Hours</h6>
                                        <p class="text-muted mb-1">Monday - Friday: 10:00 AM - 6:00 PM</p>
                                        <p class="text-muted mb-0">Saturday: 10:00 AM - 2:00 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section (Placeholder) -->
<section class="py-0">
    <div class="container-fluid p-0">
        <div class="ratio ratio-21x9 map-frame-limit">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d227748.8147744242!2d80.77769855!3d26.8467088!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399bfd991f32b16b%3A0x93ccba8909978be7!2sLucknow%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1234567890123!5m2!1sen!2sin"
                class="map-frame"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</section>
