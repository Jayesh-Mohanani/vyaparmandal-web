<?php
/**
 * Terms and Conditions Page
 */
?>

<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Terms & Conditions</h1>
                <p class="lead mb-2">Please read these terms carefully before using our website and services.</p>
                <p class="mb-0 text-white-50">Effective Date: <?php echo $effectiveDate; ?></p>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="h4 mb-3">1. Acceptance of Terms</h2>
                        <p class="text-muted mb-4">
                            By accessing and using <?php echo APP_NAME; ?>, you agree to comply with and be bound by these Terms & Conditions.
                            If you do not agree with any part of these terms, please discontinue use of the website.
                        </p>

                        <h2 class="h4 mb-3">2. Use of Website</h2>
                        <p class="text-muted mb-2">You agree to use this website only for lawful purposes and in a manner that does not:</p>
                        <ul class="text-muted mb-4">
                            <li>Violate applicable laws or regulations.</li>
                            <li>Infringe rights of any individual, business, or organization.</li>
                            <li>Disrupt, damage, or interfere with website operations.</li>
                            <li>Attempt unauthorized access to protected areas.</li>
                        </ul>

                        <h2 class="h4 mb-3">3. Membership and Form Submissions</h2>
                        <p class="text-muted mb-4">
                            Information submitted through membership or contact forms must be accurate and complete.
                            We reserve the right to reject, suspend, or remove any submission that appears false, misleading,
                            abusive, or non-compliant with organizational policy.
                        </p>

                        <h2 class="h4 mb-3">4. Intellectual Property</h2>
                        <p class="text-muted mb-4">
                            All content on this website, including text, logos, graphics, media assets, and layout elements,
                            is owned by or licensed to <?php echo APP_NAME; ?> unless otherwise stated.
                            Unauthorized copying, reuse, republication, or distribution is prohibited.
                        </p>

                        <h2 class="h4 mb-3">5. Third-Party Links</h2>
                        <p class="text-muted mb-4">
                            This website may include links to third-party websites for convenience. We do not control or endorse
                            third-party content and are not responsible for their policies, availability, or practices.
                        </p>

                        <h2 class="h4 mb-3">6. Limitation of Liability</h2>
                        <p class="text-muted mb-4">
                            <?php echo APP_NAME; ?> makes reasonable efforts to keep information updated and accurate, but no guarantees
                            are provided regarding completeness or suitability. Use of this website is at your own risk.
                            We are not liable for direct or indirect losses resulting from website use.
                        </p>

                        <h2 class="h4 mb-3">7. Changes to Terms</h2>
                        <p class="text-muted mb-4">
                            We may update these Terms & Conditions from time to time. Revised terms become effective once posted on this page.
                            Continued use of the website after updates indicates acceptance of the revised terms.
                        </p>

                        <h2 class="h4 mb-3">8. Contact</h2>
                        <p class="text-muted mb-0">
                            For queries regarding these terms, contact us at
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a>
                            or visit our <a href="<?php echo url('/contact'); ?>">Contact page</a>.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
