<?php
/**
 * Login Page
 * User authentication form
 */
?>

<section class="py-5 min-vh-100 d-flex align-items-center bg-light auth-screen">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="text-center mb-4">
                    <a href="<?php echo url('/'); ?>" class="text-decoration-none d-inline-flex flex-column align-items-center">
                        <img src="<?php echo asset('images/testing images/test-logo-image-1.png'); ?>"
                             alt="<?php echo APP_NAME; ?>"
                                class="img-fluid rounded shadow-sm mb-3 auth-brand-image"
                                decoding="async">
                        <h2 class="fw-bold text-dark mb-1"><?php echo APP_NAME; ?></h2>
                    </a>
                    <p class="text-muted">Sign in to your account</p>
                </div>

                <div class="card border-0 shadow auth-card">
                    <div class="card-body p-5">
                        <h4 class="mb-4 text-center">Welcome Back</h4>

                        <?php if ($error = getError('login')): ?>
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i><?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo url('/login/submit'); ?>" method="POST" class="needs-validation" novalidate>
                            <input type="hidden" name="return_to" value="<?php echo htmlspecialchars($returnTo ?? '/'); ?>">

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email"
                                           class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>"
                                           id="email"
                                           name="email"
                                           value="<?php echo old('email'); ?>"
                                           placeholder="Enter your email"
                                           autocomplete="email"
                                           required
                                           autofocus>
                                </div>
                                <?php if ($error = getError('email')): ?>
                                    <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password"
                                           class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>"
                                           id="password"
                                           name="password"
                                           placeholder="Enter your password"
                                           autocomplete="current-password"
                                           required>
                                </div>
                                <?php if ($error = getError('password')): ?>
                                    <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                <?php endif; ?>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                                <a href="<?php echo url('/contact'); ?>" class="text-decoration-none small">Need help?</a>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>

                            <div class="alert alert-info small mb-3">
                                <strong>Demo Credentials:</strong><br>
                                <strong>Admin:</strong> admin@vyaparmandal.com / admin123<br>
                                <strong>User:</strong> rajesh@example.com / password123
                            </div>

                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Don't have an account?
                                    <a href="<?php echo url('/register?return_to=' . urlencode($returnTo ?? '/')); ?>" class="text-decoration-none fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </form>
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
