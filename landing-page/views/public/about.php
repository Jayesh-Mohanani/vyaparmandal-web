<?php
/**
 * About Page
 * Information about the organization
 */
?>

<!-- Page Header -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">About Us</h1>
                <p class="lead">
                    Empowering traders and businesses across Uttar Pradesh
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="<?php echo asset('images/testing images/test-image-1.png'); ?>"
                     alt="Vyapar Mandal"
                     class="img-fluid rounded shadow"
                     loading="lazy"
                     decoding="async">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Who We Are</h2>
                <p class="text-muted mb-4">
                    <?php echo APP_NAME; ?> is the premier trade organization representing the interests of small and medium
                    businesses across Uttar Pradesh. Established in <?php echo date('Y') - ($stats['years_active'] ?? 15); ?>,
                    we have grown to become the most influential voice for traders in the state.
                </p>
                <p class="text-muted mb-4">
                    With over <?php echo number_format($stats['total_members']); ?> registered members, we work tirelessly to
                    advocate for fair trade policies, simplified taxation systems, and business-friendly regulations that enable
                    traders to thrive and contribute to the state's economic growth.
                </p>
                <p class="text-muted">
                    Our organization has been instrumental in bringing about significant policy changes, including the increase
                    in GST exemption limits, formation of the Trader Welfare Board, and reduction in market fees.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Mission & Vision -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="bi bi-bullseye text-primary display-icon-lg"></i>
                        </div>
                        <h3 class="mb-3">Our Mission</h3>
                        <p class="text-muted">
                            To create a unified platform for traders that advocates for their rights, provides essential
                            training and resources, and fosters a supportive business community that drives economic prosperity
                            across Uttar Pradesh.
                        </p>
                        <ul class="list-unstyled mt-4">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Advocate for trader-friendly policies
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Provide training and skill development
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Create networking opportunities
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                Support business growth and innovation
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-5">
                        <div class="mb-4">
                            <i class="bi bi-eye text-warning display-icon-lg"></i>
                        </div>
                        <h3 class="mb-3">Our Vision</h3>
                        <p class="text-muted">
                            To build the most empowered, digitally advanced, and economically prosperous trading community
                            in India, where every trader has access to the resources, support, and opportunities needed to
                            succeed in the modern business landscape.
                        </p>
                        <ul class="list-unstyled mt-4">
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                Leading trader organization in India
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                100% digital literacy for members
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                Fair and transparent trade policies
                            </li>
                            <li class="mb-2">
                                <i class="bi bi-check-circle-fill text-warning me-2"></i>
                                Sustainable business practices
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Our Core Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-shield-check text-primary display-icon-lg"></i>
                    </div>
                    <h5 class="mb-3">Integrity</h5>
                    <p class="text-muted">
                        We maintain the highest standards of honesty and transparency in all our dealings
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-people text-success display-icon-lg"></i>
                    </div>
                    <h5 class="mb-3">Unity</h5>
                    <p class="text-muted">
                        Together we are stronger, creating a collective voice that cannot be ignored
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-lightbulb text-warning display-icon-lg"></i>
                    </div>
                    <h5 class="mb-3">Innovation</h5>
                    <p class="text-muted">
                        Embracing technology and modern practices to stay ahead in business
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4">
                    <div class="mb-3">
                        <i class="bi bi-heart text-danger display-icon-lg"></i>
                    </div>
                    <h5 class="mb-3">Service</h5>
                    <p class="text-muted">
                        Dedicated to serving our members and the broader trading community
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['total_members']; ?>">0</span>
                    <div class="stat-label text-white-50">Total Members</div>
                </div>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['total_awards']; ?>">0</span>
                    <div class="stat-label text-white-50">Awards Won</div>
                </div>
            </div>

            <div class="col-md-3 mb-4 mb-md-0">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['total_events']; ?>">0</span>
                    <div class="stat-label text-white-50">Events Organized</div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-item">
                    <span class="stat-number text-white" data-count="<?php echo $stats['years_active']; ?>">0</span>
                    <div class="stat-label text-white-50">Years of Service</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Do -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">What We Do</h2>
            <p class="section-subtitle">Our services and initiatives for the trading community</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-megaphone-fill text-primary fs-1 mb-3"></i>
                        <h5 class="mb-3">Policy Advocacy</h5>
                        <p class="text-muted">
                            We actively engage with government officials to advocate for trader-friendly policies,
                            GST reforms, and fair trade regulations.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-book-fill text-success fs-1 mb-3"></i>
                        <h5 class="mb-3">Training Programs</h5>
                        <p class="text-muted">
                            Regular workshops on digital payments, GST compliance, e-commerce, and modern business
                            practices to keep traders updated.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-people-fill text-warning fs-1 mb-3"></i>
                        <h5 class="mb-3">Networking Events</h5>
                        <p class="text-muted">
                            Organize conferences, trade fairs, and networking sessions to facilitate business
                            connections and growth opportunities.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-shield-check text-info fs-1 mb-3"></i>
                        <h5 class="mb-3">Legal Assistance</h5>
                        <p class="text-muted">
                            Provide legal guidance and support to members facing trade-related disputes or
                            regulatory challenges.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-cash-coin text-danger fs-1 mb-3"></i>
                        <h5 class="mb-3">Financial Support</h5>
                        <p class="text-muted">
                            Help members access loan facilities, insurance schemes, and government welfare
                            programs designed for traders.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <i class="bi bi-laptop text-primary fs-1 mb-3"></i>
                        <h5 class="mb-3">Digital Transformation</h5>
                        <p class="text-muted">
                            Guide traders in adopting digital tools, online marketing, and e-commerce platforms
                            to expand their business reach.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-4">Join Our Mission</h2>
        <p class="lead text-muted mb-4">
            Be part of the change. Together, we can build a stronger, more prosperous trading community.
        </p>
        <a href="<?php echo url('/membership'); ?>" class="btn btn-primary btn-lg me-3">
            <i class="bi bi-person-plus-fill me-2"></i>Become a Member
        </a>
        <a href="<?php echo url('/contact'); ?>" class="btn btn-outline-primary btn-lg">
            <i class="bi bi-envelope me-2"></i>Contact Us
        </a>
    </div>
</section>
