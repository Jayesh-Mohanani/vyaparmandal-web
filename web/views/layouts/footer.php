    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container py-3 py-lg-4">
            <div class="row g-4 align-items-start">
                <div class="col-lg-5">
                    <div class="site-footer__brand-wrap">
                        <div class="site-footer__brand">
                            <img src="<?php echo asset('images/testing images/test-logo-image-1.png'); ?>" alt="<?php echo APP_NAME; ?> logo" class="site-footer__logo" decoding="async">
                            <h5 class="site-footer__title mb-0"><?php echo APP_NAME; ?></h5>
                        </div>

                        <p class="site-footer__text mb-0 mt-2">
                            <?php echo APP_NAME; ?> empowers traders and business owners across Uttar Pradesh.
                            We support fair trade policies, practical training, and stronger networking opportunities.
                        </p>
                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="site-footer__links-wrap">
                        <h5 class="site-footer__heading mb-3">Quick Links</h5>
                        <div class="row g-1 g-md-2">
                            <div class="col-6 col-md-4">
                                <ul class="site-footer__links list-unstyled mb-0">
                                    <li><a href="<?php echo url('/'); ?>">Home</a></li>
                                    <li><a href="<?php echo url('/about'); ?>">About Us</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4">
                                <ul class="site-footer__links list-unstyled mb-0">
                                    <li><a href="<?php echo url('/gallery'); ?>">Gallery</a></li>
                                    <li><a href="<?php echo url('/events'); ?>">Events</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-md-4">
                                <ul class="site-footer__links list-unstyled mb-0">
                                    <li><a href="<?php echo url('/contact'); ?>">Contact Us</a></li>
                                    <li><a href="<?php echo url('/terms'); ?>">Terms & Conditions</a></li>
                                    <li><a href="<?php echo url('/privacy-policy'); ?>">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-footer__bottom py-3">
            <div class="container">
                <div class="row align-items-center g-3">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0">&copy; <?php echo date('Y'); ?> <?php echo APP_NAME; ?>. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <p class="mb-0">Developed with <i class="bi bi-heart-fill text-danger"></i> for traders of Uttar Pradesh</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="backToTop" class="site-back-to-top position-fixed bottom-0 end-0 m-4" type="button" aria-label="Back to top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JavaScript -->
    <script src="<?php echo asset('js/main.js'); ?>"></script>

</body>
</html>
