<!-- Top Bar -->
<div class="bg-primary text-white py-2 border-bottom" style="border-bottom: 1px solid rgba(255,255,255,0.1)">
    <div class="container">
        <div class="row align-items-center gx-3">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <small>
                    <i class="bi bi-envelope me-2"></i>
                    <a href="mailto:<?php echo CONTACT_EMAIL; ?>" class="text-white text-decoration-none">
                        <?php echo CONTACT_EMAIL; ?>
                    </a>
                    <span class="mx-2 opacity-50">|</span>
                    <i class="bi bi-telephone me-2"></i>
                    <a href="tel:<?php echo CONTACT_PHONE; ?>" class="text-white text-decoration-none">
                        <?php echo CONTACT_PHONE; ?>
                    </a>
                </small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <small class="d-flex justify-content-center justify-content-md-end gap-2">
                    <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="text-white" target="_blank" title="Facebook">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?php echo SOCIAL_TWITTER; ?>" class="text-white" target="_blank" title="Twitter">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="text-white" target="_blank" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?php echo SOCIAL_LINKEDIN; ?>" class="text-white" target="_blank" title="LinkedIn">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="text-white" target="_blank" title="YouTube">
                        <i class="bi bi-youtube"></i>
                    </a>
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
    <div class="container">
        <!-- Logo/Brand -->
        <a class="navbar-brand fw-bold text-primary" href="<?php echo url('/'); ?>">
            <i class="bi bi-building text-warning fs-3 me-2"></i>
            <span class="fs-5">Vyapar Mandal</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center g-2">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/') && getCurrentPath() === '/' ? 'active' : ''; ?>" href="<?php echo url('/'); ?>">
                        <i class="bi bi-house-fill me-1"></i>Home
                    </a>
                </li>

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/about'); ?>" href="<?php echo url('/about'); ?>">
                        <i class="bi bi-info-circle-fill me-1"></i>About
                    </a>
                </li>

                <!-- Events -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/events'); ?>" href="<?php echo url('/events'); ?>">
                        <i class="bi bi-calendar-event me-1"></i>Events
                    </a>
                </li>

                <!-- Gallery -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/gallery'); ?>" href="<?php echo url('/gallery'); ?>">
                        <i class="bi bi-images me-1"></i>Gallery
                    </a>
                </li>

                <!-- Membership -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/membership'); ?>" href="<?php echo url('/membership'); ?>">
                        <i class="bi bi-people-fill me-1"></i>Membership
                    </a>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/contact'); ?>" href="<?php echo url('/contact'); ?>">
                        <i class="bi bi-envelope-fill me-1"></i>Contact
                    </a>
                </li>

                <?php if (isLoggedIn()): ?>
                    <!-- Admin Button (Only for Admins) -->
                    <?php if (isAdmin()): ?>
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-warning btn-sm px-3" href="<?php echo url('/admin'); ?>" title="Admin Dashboard">
                            <i class="bi bi-gear-fill me-1"></i>Admin
                        </a>
                    </li>
                    <?php endif; ?>

                    <!-- User Profile Dropdown -->
                    <li class="nav-item dropdown ms-lg-3">
                        <a class="nav-link dropdown-toggle navbar-user-profile" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&size=32&background=random&color=fff"
                                 class="navbar-user-avatar"
                                 alt="<?php echo htmlspecialchars($_SESSION['user_name']); ?>"
                                 title="<?php echo htmlspecialchars($_SESSION['user_name']); ?>">
                            <span class="d-none d-lg-inline"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li>
                                <a class="dropdown-item" href="<?php echo url('/profile'); ?>">
                                    <i class="bi bi-person-circle me-2"></i>My Profile
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item text-danger" href="<?php echo url('/logout'); ?>">
                                    <i class="bi bi-box-arrow-right me-2"></i>Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php else: ?>
                    <!-- Login/Register Buttons (Not Logged In) -->
                    <li class="nav-item ms-lg-3">
                        <a class="btn btn-primary btn-sm px-3" href="<?php echo url('/login'); ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-primary btn-sm px-3" href="<?php echo url('/register'); ?>">
                            <i class="bi bi-person-plus me-1"></i>Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
