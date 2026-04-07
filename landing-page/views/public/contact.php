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
        <div class="row g-4">
            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="mb-4">
                    <h3 class="mb-4">Get in Touch</h3>
                    <p class="text-muted">
                        Have questions or need assistance? Feel free to contact us through any of the following channels.
                    </p>
                </div>

                <!-- Contact Cards -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="bi bi-geo-alt-fill text-primary fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Address</h6>
                                <p class="text-muted mb-0">
                                    <?php echo CONTACT_ADDRESS; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="bi bi-telephone-fill text-success fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
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

                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="bi bi-envelope-fill text-danger fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
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

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-start">
                            <div class="flex-shrink-0">
                                <i class="bi bi-clock-fill text-warning fs-3"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-1">Office Hours</h6>
                                <p class="text-muted mb-1">Monday - Friday: 10:00 AM - 6:00 PM</p>
                                <p class="text-muted mb-0">Saturday: 10:00 AM - 2:00 PM</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-4">
                    <h6 class="mb-3">Follow Us</h6>
                    <div class="d-flex gap-2">
                        <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="btn btn-outline-primary" target="_blank">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="<?php echo SOCIAL_TWITTER; ?>" class="btn btn-outline-info" target="_blank">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="btn btn-outline-danger" target="_blank">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="<?php echo SOCIAL_LINKEDIN; ?>" class="btn btn-outline-primary" target="_blank">
                            <i class="bi bi-linkedin"></i>
                        </a>
                        <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="btn btn-outline-danger" target="_blank">
                            <i class="bi bi-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h3 class="mb-4">Send us a Message</h3>

                        <form action="<?php echo url('/contact/submit'); ?>" method="POST" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <!-- Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control <?php echo getError('name') ? 'is-invalid' : ''; ?>"
                                           id="name"
                                           name="name"
                                         autocomplete="name"
                                           value="<?php echo old('name'); ?>"
                                           required>
                                    <?php if ($error = getError('name')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <input type="email"
                                           class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>"
                                           id="email"
                                           name="email"
                                         autocomplete="email"
                                           value="<?php echo old('email'); ?>"
                                           required>
                                    <?php if ($error = getError('email')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel"
                                           class="form-control"
                                           id="phone"
                                           name="phone"
                                         autocomplete="tel"
                                         inputmode="tel"
                                           value="<?php echo old('phone'); ?>"
                                           maxlength="10">
                                </div>

                                <!-- Subject -->
                                <div class="col-md-6">
                                    <label for="subject" class="form-label">Subject</label>
                                    <select class="form-select" id="subject" name="subject">
                                        <option value="General Inquiry" selected>General Inquiry</option>
                                        <option value="Membership">Membership</option>
                                        <option value="Events">Events</option>
                                        <option value="Support">Support</option>
                                        <option value="Feedback">Feedback</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <!-- Message -->
                                <div class="col-12">
                                    <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                                    <textarea class="form-control <?php echo getError('message') ? 'is-invalid' : ''; ?>"
                                              id="message"
                                              name="message"
                                              rows="6"
                                              required><?php echo old('message'); ?></textarea>
                                    <?php if ($error = getError('message')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="bi bi-send me-2"></i>Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
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
