<!-- Top Bar -->
<div class="bg-primary text-white py-2">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <small>
                    <i class="bi bi-envelope me-2"></i><?php echo CONTACT_EMAIL; ?>
                    <span class="mx-2">|</span>
                    <i class="bi bi-telephone me-2"></i><?php echo CONTACT_PHONE; ?>
                </small>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <small>
                    <a href="<?php echo SOCIAL_FACEBOOK; ?>" class="text-white me-3" target="_blank">
                        <i class="bi bi-facebook"></i>
                    </a>
                    <a href="<?php echo SOCIAL_TWITTER; ?>" class="text-white me-3" target="_blank">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="<?php echo SOCIAL_INSTAGRAM; ?>" class="text-white me-3" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="<?php echo SOCIAL_LINKEDIN; ?>" class="text-white me-3" target="_blank">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="<?php echo SOCIAL_YOUTUBE; ?>" class="text-white" target="_blank">
                        <i class="bi bi-youtube"></i>
                    </a>
                </small>
            </div>
        </div>
    </div>
</div>

<!-- Main Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">
        <!-- Logo/Brand -->
        <a class="navbar-brand fw-bold text-primary" href="<?php echo url('/'); ?>">
            <i class="bi bi-building text-warning fs-3 me-2"></i>
            <span class="fs-5">Vyapar Mandal</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/') && getCurrentPath() === '/' ? 'active' : ''; ?>" href="<?php echo url('/'); ?>">
                        Home
                    </a>
                </li>

                <!-- About -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/about'); ?>" href="<?php echo url('/about'); ?>">
                        About
                    </a>
                </li>

                <!-- Events -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/events'); ?>" href="<?php echo url('/events'); ?>">
                        Events
                    </a>
                </li>

                <!-- Gallery -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/gallery'); ?>" href="<?php echo url('/gallery'); ?>">
                        Gallery
                    </a>
                </li>

                <!-- Membership -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/membership'); ?>" href="<?php echo url('/membership'); ?>">
                        Membership
                    </a>
                </li>

                <!-- Contact -->
                <li class="nav-item">
                    <a class="nav-link <?php echo isActive('/contact'); ?>" href="<?php echo url('/contact'); ?>">
                        Contact
                    </a>
                </li>

                <?php if (isLoggedIn()): ?>
                    <!-- User Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i>
                            <?php echo $_SESSION['user_name'] ?? 'User'; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if (isAdmin()): ?>
                                <li>
                                    <a class="dropdown-item" href="<?php echo url('/admin/dashboard'); ?>">
                                        <i class="bi bi-speedometer2 me-2"></i>Dashboard
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                            <?php endif; ?>
                            <li>
                                <a class="dropdown-item" href="<?php echo url('/profile'); ?>">
                                    <i class="bi bi-person me-2"></i>My Profile
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
                    <!-- Login/Register -->
                    <li class="nav-item">
                        <a class="btn btn-outline-primary btn-sm ms-lg-2" href="<?php echo url('/login'); ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-sm ms-2" href="<?php echo url('/register'); ?>">
                            <i class="bi bi-person-plus me-1"></i>Register
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
