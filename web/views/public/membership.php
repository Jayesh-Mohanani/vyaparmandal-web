<?php
/**
 * Membership Page
 * Membership registration form
 */
?>

<!-- Page Header -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">Become a Member</h1>
                <p class="lead">
                    Join the largest trader organization in Uttar Pradesh
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Membership Benefits -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Membership Benefits</h2>
            <p class="section-subtitle">Why you should join us</p>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="bi bi-megaphone-fill text-primary fs-1 mb-3"></i>
                    <h5 class="mb-3">Voice in Policy Making</h5>
                    <p class="text-muted">
                        Your concerns reach government officials through our strong advocacy network
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="bi bi-book-fill text-success fs-1 mb-3"></i>
                    <h5 class="mb-3">Free Training Programs</h5>
                    <p class="text-muted">
                        Access to workshops on GST, digital payments, and modern business practices
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="bi bi-people-fill text-warning fs-1 mb-3"></i>
                    <h5 class="mb-3">Networking Opportunities</h5>
                    <p class="text-muted">
                        Connect with fellow traders and expand your business network
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="bi bi-shield-check text-info fs-1 mb-3"></i>
                    <h5 class="mb-3">Legal Assistance</h5>
                    <p class="text-muted">
                        Get legal guidance on trade-related matters and disputes
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="bi bi-newspaper text-danger fs-1 mb-3"></i>
                    <h5 class="mb-3">Regular Updates</h5>
                    <p class="text-muted">
                        Stay informed about policy changes, opportunities, and events
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="bi bi-award-fill text-primary fs-1 mb-3"></i>
                    <h5 class="mb-3">Recognition & Awards</h5>
                    <p class="text-muted">
                        Get recognized for your contributions to the trading community
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Membership Form -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h3 class="mb-4 text-center">Membership Application Form</h3>

                        <form action="<?php echo url('/membership/submit'); ?>" method="POST" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control <?php echo getError('name') ? 'is-invalid' : ''; ?>"
                                           id="name"
                                           name="name"
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
                                           value="<?php echo old('email'); ?>"
                                           required>
                                    <?php if ($error = getError('email')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <input type="tel"
                                           class="form-control <?php echo getError('phone') ? 'is-invalid' : ''; ?>"
                                           id="phone"
                                           name="phone"
                                           value="<?php echo old('phone'); ?>"
                                           maxlength="10"
                                           required>
                                    <?php if ($error = getError('phone')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Business Name -->
                                <div class="col-md-6">
                                    <label for="business_name" class="form-label">Business Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           class="form-control <?php echo getError('business_name') ? 'is-invalid' : ''; ?>"
                                           id="business_name"
                                           name="business_name"
                                           value="<?php echo old('business_name'); ?>"
                                           required>
                                    <?php if ($error = getError('business_name')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Business Type -->
                                <div class="col-md-6">
                                    <label for="business_type" class="form-label">Business Type <span class="text-danger">*</span></label>
                                    <select class="form-select <?php echo getError('business_type') ? 'is-invalid' : ''; ?>"
                                            id="business_type"
                                            name="business_type"
                                            required>
                                        <option value="" selected>Choose...</option>
                                        <option value="retail" <?php echo old('business_type') === 'retail' ? 'selected' : ''; ?>>Retail</option>
                                        <option value="wholesale" <?php echo old('business_type') === 'wholesale' ? 'selected' : ''; ?>>Wholesale</option>
                                        <option value="manufacturer" <?php echo old('business_type') === 'manufacturer' ? 'selected' : ''; ?>>Manufacturing</option>
                                        <option value="service" <?php echo old('business_type') === 'service' ? 'selected' : ''; ?>>Service Provider</option>
                                        <option value="other" <?php echo old('business_type') === 'other' ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                    <?php if ($error = getError('business_type')): ?>
                                        <div class="invalid-feedback"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Membership Type -->
                                <div class="col-md-6">
                                    <label for="membership_type" class="form-label">Membership Type <span class="text-danger">*</span></label>
                                    <select class="form-select"
                                            id="membership_type"
                                            name="membership_type"
                                            required>
                                        <option value="regular" selected>Regular (Annual)</option>
                                        <option value="premium">Premium (3 Years)</option>
                                        <option value="lifetime">Lifetime</option>
                                    </select>
                                </div>

                                <!-- City -->
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text"
                                           class="form-control"
                                           id="city"
                                           name="city"
                                           value="<?php echo old('city'); ?>">
                                </div>

                                <!-- Address -->
                                <div class="col-12">
                                    <label for="address" class="form-label">Business Address</label>
                                    <textarea class="form-control"
                                              id="address"
                                              name="address"
                                              rows="3"><?php echo old('address'); ?></textarea>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="terms"
                                               required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#">terms and conditions</a> of membership
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">
                                        <i class="bi bi-send me-2"></i>Submit Application
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

<!-- Membership Plans -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title d-inline-block">Membership Plans</h2>
            <p class="section-subtitle">Choose the plan that suits you best</p>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <h5 class="text-uppercase text-muted mb-3">Regular</h5>
                        <h2 class="mb-4">₹500<small class="text-muted fs-6">/year</small></h2>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>All basic benefits</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Event access</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Monthly newsletter</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Networking opportunities</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100 border-primary" style="border-width: 2px !important;">
                    <div class="card-header bg-primary text-white text-center">
                        <small>MOST POPULAR</small>
                    </div>
                    <div class="card-body p-4 text-center">
                        <h5 class="text-uppercase text-muted mb-3">Premium</h5>
                        <h2 class="mb-4">₹1,200<small class="text-muted fs-6">/3 years</small></h2>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>All regular benefits</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Priority event access</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Legal consultation</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Business listing</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4 text-center">
                        <h5 class="text-uppercase text-muted mb-3">Lifetime</h5>
                        <h2 class="mb-4">₹5,000<small class="text-muted fs-6">/lifetime</small></h2>
                        <ul class="list-unstyled text-start mb-4">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>All premium benefits</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>VIP event access</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Featured listing</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Exclusive networking</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
