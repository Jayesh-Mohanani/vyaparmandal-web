<?php
/**
 * Login Page
 * User authentication form
 */
?>

<section class="py-5 min-vh-100 d-flex align-items-center bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="text-center mb-4">
                    <a href="<?php echo url('/'); ?>" class="text-decoration-none">
                        <i class="bi bi-building text-primary fs-1"></i>
                        <h2 class="mt-2 fw-bold text-dark">Vyapar Mandal</h2>
                    </a>
                    <p class="text-muted">Sign in to your account</p>
                </div>

                <div class="card border-0 shadow">
                    <div class="card-body p-5">
                        <h4 class="mb-4 text-center">Welcome Back</h4>

                        <?php if ($error = getError('login')): ?>
                            <div class="alert alert-danger">
                                <i class="bi bi-exclamation-triangle me-2"></i><?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form action="<?php echo url('/login/submit'); ?>" method="POST" class="needs-validation" novalidate>
                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address
 <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>
                                    <input type="email"
                                           class="form-control <?php echo getError('email') ? 'is-invalid' : ''; ?>"
                                           id="email"
                                           name="email"
                                           value="<?php echo old('email'); ?>"
                                           placeholder="Enter your email"
                                           required
                                           autofocus>
                                </div>
                                <?php if ($error = getError('email')): ?>
                                    <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                    <input type="password"
                                           class="form-control <?php echo getError('password') ? 'is-invalid' : ''; ?>"
                                           id="password"
                                           name="password"
                                           placeholder="Enter your password"
                                           required>
                                </div>
                                <?php if ($error = getError('password')): ?>
                                    <div class="text-danger small mt-1"><?php echo $error; ?></div>
                                <?php endif; ?>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember me
                                    </label>
                                </div>
                                <a href="#" class="text-decoration-none small">Forgot Password?</a>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>

                            <!-- Demo Credentials Info -->
                            <div class="alert alert-info small mb-3">
                                <strong>Demo Credentials:</strong><br>
                                <strong>Admin:</strong> admin@vyaparmandal.com / admin123<br>
                                <strong>User:</strong> rajesh@example.com / password123
                            </div>

                            <!-- Divider -->
                            <div class="text-center">
                                <p class="text-muted">
                                    Don't have an account?
                                    <a href="<?php echo url('/register'); ?>" class="text-decoration-none fw-bold">Sign Up</a>
                                </p>
                            </div>
                        </form>
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
