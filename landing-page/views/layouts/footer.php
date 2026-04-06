    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5 pb-3">
        <div class="container">
            <div class="row g-4">
                <!-- About Section -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="text-uppercase mb-3 text-warning">About Us</h5>
                    <p class="text-light-50">
                        <?php echo APP_NAME; ?> is dedicated to empowering traders and business owners across Uttar Pradesh.
                        We advocate for fair trade policies, provide training programs, and create networking opportunities.
                    </p>
                    <!-- Social Media Links -->
                    <div class="d-flex gap-3 mt-3">
                        <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="text-light" target="_blank" rel="noopener">
                            <i class="bi bi-facebook fs-4"></i>
                        </a>
                        <a href="<?php echo SOCIAL_TWITTER; ?>" class="text-light" target="_blank" rel="noopener">
                            <i class="bi bi-twitter-x fs-4"></i>
                        </a>
                        <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="text-light" target="_blank" rel="noopener">
                            <i class="bi bi-instagram fs-4"></i>
                        </a>
                        <a href="<?php echo SOCIAL_LINKEDIN; ?>" class="text-light" target="_blank" rel="noopener">
                            <i class="bi bi-linkedin fs-4"></i>
                        </a>
                        <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="text-light" target="_blank" rel="noopener">
                            <i class="bi bi-youtube fs-4"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-uppercase mb-3 text-warning">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?php echo url('/'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Home
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/about'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> About Us
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/events'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Events
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/gallery'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Gallery
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/contact'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Contact Us
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase mb-3 text-warning">Our Services</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="<?php echo url('/membership'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Membership
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/events'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Training Programs
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/'); ?>#demands" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Trade Advocacy
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Business Support
                            </a>
                        </li>
                        <li class="mb-2">
                            <a href="<?php echo url('/'); ?>" class="text-light text-decoration-none">
                                <i class="bi bi-chevron-right"></i> Legal Assistance
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-uppercase mb-3 text-warning">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="bi bi-geo-alt-fill text-warning me-2"></i>
                            <span><?php echo CONTACT_ADDRESS; ?></span>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-telephone-fill text-warning me-2"></i>
                            <a href="tel:<?php echo str_replace([' ', '+', '-'], '', CONTACT_PHONE); ?>" class="text-light text-decoration-none">
                                <?php echo CONTACT_PHONE; ?>
                            </a>
                        </li>
                        <li class="mb-3">
                            <i class="bi bi-envelope-fill text-warning me-2"></i>
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="text-light text-decoration-none">
                                <?php echo CONTACT_EMAIL; ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 bg-light opacity-25">

            <!-- Copyright -->
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">
                        &copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">
                        Developed with <i class="bi bi-heart-fill text-danger"></i> for traders of Uttar Pradesh
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="btn btn-warning btn-lg rounded-circle position-fixed bottom-0 end-0 m-4 shadow" style="display: none; z-index: 1000;">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="<?php echo asset('js/main.js'); ?>"></script>

    <!-- Back to Top Script -->
    <script>
        // Back to top button
        const backToTopBtn = document.getElementById('backToTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.style.display = 'block';
            } else {
                backToTopBtn.style.display = 'none';
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>
