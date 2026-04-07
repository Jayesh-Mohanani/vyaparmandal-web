<?php
/**
 * Registration Page
 * User registration form
 */
?>

<section class="py-5 min-vh-100 d-flex align-items-center bg-light auth-screen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="text-center mb-4">
                    <a href="<?php echo url('/'); ?>" class="text-decoration-none d-inline-flex flex-column align-items-center">
                        <img src="<?php echo asset('images/testing images/test-logo-image-1.png'); ?>"
                             alt="<?php echo APP_NAME; ?>"
                                class="img-fluid rounded shadow-sm mb-3 auth-brand-image"
                                decoding="async">
                        <h2 class="fw-bold text-dark mb-1"><?php echo APP_NAME; ?></h2>
                    </a>
                    <p class="text-muted">Create your account</p>
                </div>

                <div class="card border-0 shadow auth-card">
                    <div class="card-body p-5">
                        <h4 class="mb-4 text-center">Sign Up</h4>

                        <form action="<?php echo url('/register/submit'); ?>" method="POST" class="needs-validation" novalidate>
                            <input type="hidden" name="return_to" value="<?php echo htmlspecialchars($returnTo ?? '/'); ?>">

                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text"
                                               class="form-control <?php echo getError('name') ? 'is-invalid' : ''; ?>"
                                               id="name"
                                               name="name"
                                               value="<?php echo old('name'); ?>"
                                               placeholder="Enter your full name"
                                               autocomplete="name"
                                               required
                                               autofocus>
                                    </div>
                                    <?php if ($error = getError('name')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email"
                                               class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>"
                                               id="email"
                                               name="email"
                                               value="<?php echo old('email'); ?>"
                                               placeholder="your@email.com"
                                               autocomplete="email"
                                               required>
                                    </div>
                                    <?php if ($error = getError('email')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="tel"
                                               class="form-control <?php echo getError('phone') ? 'is-invalid' : ''; ?>"
                                               id="phone"
                                               name="phone"
                                               value="<?php echo old('phone'); ?>"
                                               placeholder="9876543210"
                                               autocomplete="tel"
                                               inputmode="tel"
                                               maxlength="10"
                                               required>
                                    </div>
                                    <?php if ($error = getError('phone')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password"
                                               class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>"
                                               id="password"
                                               name="password"
                                               placeholder="Min 8 characters"
                                               autocomplete="new-password"
                                               required>
                                    </div>
                                    <?php if ($error = getError('password')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php else: ?>
                                        <small class="text-muted">Minimum 8 characters</small>
                                    <?php endif; ?>
                                </div>

                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input type="password"
                                               class="form-control <?php echo getError('confirm_password') ? 'is-invalid' : ''; ?>"
                                               id="confirm_password"
                                               name="confirm_password"
                                               placeholder="Re-enter password"
                                               autocomplete="new-password"
                                               required>
                                    </div>
                                    <?php if ($error = getError('confirm_password')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="terms" required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a>
                                            and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2">
                                        <i class="bi bi-person-plus me-2"></i>Create Account
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="text-center mt-4">
                            <p class="text-muted mb-0">
                                Already have an account?
                                <a href="<?php echo url('/login?return_to=' . urlencode($returnTo ?? '/')); ?>" class="text-decoration-none fw-bold">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="<?php echo url('/'); ?>" class="text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
