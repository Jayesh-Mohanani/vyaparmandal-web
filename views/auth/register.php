<?php
/**
 * Registration Page
 * User registration form
 */
?>

<section class="py-5 min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="text-center mb-4">
                    <a href="<?php echo url('/'); ?>" class="text-decoration-none">
                        <i class="bi bi-building text-primary fs-1"></i>
                        <h2 class="mt-2 fw-bold text-dark">Vyapar Mandal</h2>
                    </a>
                    <p class="text-muted">Create your account</p>
                </div>

                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h4 class="mb-4 text-center">Sign Up</h4>

                        <form action="<?php echo url('/register/submit'); ?>" method="POST" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <!-- Full Name -->
                                <div class="col-12">
                                    <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-person"></i>
                                        </span>
                                        <input type="text"
                                               class="form-control <?php echo getError('name') ? 'is-invalid' : ''; ?>"
                                               id="name"
                                               name="name"
                                               value="<?php echo old('name'); ?>"
                                               placeholder="Enter your full name"
                                               required
                                               autofocus>
                                    </div>
                                    <?php if ($error = getError('name')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email"
                                               class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>"
                                               id="email"
                                               name="email"
                                               value="<?php echo old('email'); ?>"
                                               placeholder="your@email.com"
                                               required>
                                    </div>
                                    <?php if ($error = getError('email')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Phone -->
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-telephone"></i>
                                        </span>
                                        <input type="tel"
                                               class="form-control <?php echo getError('phone') ? 'is-invalid' : ''; ?>"
                                               id="phone"
                                               name="phone"
                                               value="<?php echo old('phone'); ?>"
                                               placeholder="9876543210"
                                               maxlength="10"
                                               required>
                                    </div>
                                    <?php if ($error = getError('phone')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock"></i>
                                        </span>
                                        <input type="password"
                                               class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>"
                                               id="password"
                                               name="password"
                                               placeholder="Min 8 characters"
                                               required>
                                    </div>
                                    <?php if ($error = getError('password')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php else: ?>
                                        <small class="text-muted">Minimum 8 characters</small>
                                    <?php endif; ?>
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label for="confirm_password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="bi bi-lock-fill"></i>
                                        </span>
                                        <input type="password"
                                               class="form-control <?php echo getError('confirm_password') ? 'is-invalid' : ''; ?>"
                                               id="confirm_password"
                                               name="confirm_password"
                                               placeholder="Re-enter password"
                                               required>
                                    </div>
                                    <?php if ($error = getError('confirm_password')): ?>
                                        <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                    <?php endif; ?>
                                </div>

                                <!-- Terms & Conditions -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input"
                                               type="checkbox"
                                               id="terms"
                                               required>
                                        <label class="form-check-label" for="terms">
                                            I agree to the <a href="#" class="text-decoration-none">Terms & Conditions</a>
                                            and <a href="#" class="text-decoration-none">Privacy Policy</a>
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100 py-2">
                                        <i class="bi bi-person-plus me-2"></i>Create Account
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Divider -->
                        <div class="text-center mt-4">
                            <p class="text-muted">
                                Already have an account?
                                <a href="<?php echo url('/login'); ?>" class="text-decoration-none fw-bold">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Back to Home -->
                <div class="text-center mt-4">
                    <a href="<?php echo url('/'); ?>" class="text-decoration-none">
                        <i class="bi bi-arrow-left me-1"></i>Back to Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
