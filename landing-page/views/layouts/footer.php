    </main>
    <!-- End Main Content -->

    <!-- Footer -->
    <footer class="site-footer">
        <div class="container py-4">
            <div class="row g-3 align-items-center">
                <div class="col-12">
                    <div class="site-footer__intro d-flex flex-column flex-lg-row align-items-start align-items-lg-center gap-3">
                        <div class="site-footer__brand">
                            <img src="<?php echo asset('images/testing images/test-logo-image-1.png'); ?>" alt="<?php echo APP_NAME; ?> logo" class="site-footer__logo" decoding="async">
                            <div>
                                <h5 class="site-footer__title mb-0"><?php echo APP_NAME; ?></h5>
                            </div>
                        </div>

                        <p class="site-footer__text mb-0">
                            <?php echo APP_NAME; ?> is dedicated to empowering traders and business owners across Uttar Pradesh.
                            We advocate for fair trade policies, provide training programs, and create networking opportunities.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-3 align-items-start mt-1">
                <div class="col-lg-6 col-md-12">
                    <div class="d-flex gap-2 site-footer__social mb-3">
                        <a href="<?php echo SOCIAL_FACEBOOK; ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="<?php echo SOCIAL_TWITTER; ?>" target="_blank" rel="noopener" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                        <a href="<?php echo SOCIAL_INSTAGRAM; ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="<?php echo SOCIAL_LINKEDIN; ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                        <a href="<?php echo SOCIAL_YOUTUBE; ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    </div>

                    <ul class="list-unstyled site-footer__contact mb-0">
                        <li class="mb-2"><i class="bi bi-geo-alt-fill me-2"></i><?php echo CONTACT_ADDRESS; ?></li>
                        <li class="mb-2"><i class="bi bi-telephone-fill me-2"></i><a href="tel:<?php echo str_replace([' ', '+', '-'], '', CONTACT_PHONE); ?>"><?php echo CONTACT_PHONE; ?></a></li>
                        <li class="mb-0"><i class="bi bi-envelope-fill me-2"></i><a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a></li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-12">
                    <h5 class="site-footer__heading">Contact Form</h5>
                    <form action="<?php echo url('/contact/submit'); ?>" method="POST" class="site-footer__form">
                        <input type="text" name="name" class="form-control" placeholder="Name*" autocomplete="name" required>
                        <input type="email" name="email" class="form-control" placeholder="E-mail*" autocomplete="email" required>
                        <input type="tel" name="phone" class="form-control" placeholder="Phone*" autocomplete="tel" inputmode="tel">
                        <textarea name="message" class="form-control" rows="4" placeholder="Message*" required></textarea>
                        <button type="submit" class="site-footer__submit">Submit Now</button>
                    </form>
                </div>
            </div>

            <div class="row g-3 align-items-start mt-1">
                <div class="col-lg-3 col-md-4">
                    <h5 class="site-footer__heading">Important Links</h5>
                    <ul class="site-footer__links list-unstyled">
                        <li><a href="<?php echo url('/'); ?>">Legal</a></li>
                        <li><a href="<?php echo url('/about'); ?>">Disclaimer</a></li>
                        <li><a href="<?php echo url('/membership'); ?>">President Message</a></li>
                        <li><a href="<?php echo url('/terms'); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo url('/privacy-policy'); ?>">Privacy Policy</a></li>
                        <li><a href="<?php echo url('/login'); ?>">Admin Login</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4">
                    <h5 class="site-footer__heading">Fast Links</h5>
                    <ul class="site-footer__links list-unstyled">
                        <li><a href="<?php echo url('/'); ?>">Home</a></li>
                        <li><a href="<?php echo url('/about'); ?>">About Us</a></li>
                        <li><a href="<?php echo url('/gallery'); ?>">Gallery</a></li>
                        <li><a href="<?php echo url('/events'); ?>">Events</a></li>
                        <li><a href="<?php echo url('/contact'); ?>">Contact Us</a></li>
                    </ul>
                </div>

                <div class="col-lg-6 col-md-4">
                    <h5 class="site-footer__heading">Latest News</h5>
                    <div class="site-footer__news-list">
                        <div class="site-footer__news-item">
                            <img src="<?php echo asset('images/testing images/test-image-1.png'); ?>" alt="Latest news 1" loading="lazy" decoding="async">
                            <div>
                                <p class="mb-1">प्रदेश व्यापारी व्यापारी महासंघ 29 जनवरी 2023</p>
                                <small>Jan 2, 2023</small>
                            </div>
                        </div>
                        <div class="site-footer__news-item">
                            <img src="<?php echo asset('images/testing images/test-image-2.png'); ?>" alt="Latest news 2" loading="lazy" decoding="async">
                            <div>
                                <p class="mb-1">प्रधानमंत्री तक शिकायत पहुँचाने व्यायारी</p>
                                <small>Jun 13, 2020</small>
                            </div>
                        </div>
                        <div class="site-footer__news-item">
                            <img src="<?php echo asset('images/testing images/test-image-3.png'); ?>" alt="Latest news 3" loading="lazy" decoding="async">
                            <div>
                                <p class="mb-1">अनुप चुला के तालाब में 45 जिलों में भोजन व्यवसाय</p>
                                <small>Apr 2, 2020</small>
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
