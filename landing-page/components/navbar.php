<?php
$currentPath = getCurrentPath();
$isAdminRoute = strpos($currentPath, '/admin') === 0;
?>

<header class="site-header<?php echo $isAdminRoute ? ' site-header--admin' : ''; ?>">
    <?php if (!$isAdminRoute): ?>
    <div class="site-top-strip">
        <div class="container">
            <div class="site-top-strip__inner d-flex align-items-center justify-content-between gap-3">
                <div class="site-top-strip__support">
                    <span>Support Us :</span>
                    <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a>
                </div>

                <div class="site-top-strip__social d-flex align-items-center">
                    <a href="<?php echo SOCIAL_FACEBOOK; ?>" target="_blank" rel="noopener" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo SOCIAL_TWITTER; ?>" target="_blank" rel="noopener" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
                    <a href="<?php echo SOCIAL_YOUTUBE; ?>" target="_blank" rel="noopener" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
                    <a href="<?php echo SOCIAL_LINKEDIN; ?>" target="_blank" rel="noopener" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    <a href="<?php echo SOCIAL_INSTAGRAM; ?>" target="_blank" rel="noopener" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="site-brand-strip">
        <div class="container">
            <div class="site-brand-strip__inner d-flex flex-column flex-xl-row align-items-center justify-content-between gap-3 py-3">
                <a class="site-brand site-brand--banner" href="<?php echo url('/'); ?>" aria-label="<?php echo APP_NAME; ?> home">
                    <img src="<?php echo asset('images/testing images/test-image-4.png'); ?>" alt="<?php echo APP_NAME; ?>" class="site-brand__banner-image">
                    <span class="site-brand__text">
                        <span class="site-brand__name"><?php echo APP_NAME; ?></span>
                    </span>
                </a>

                <div class="site-contact-grid d-flex flex-column flex-md-row align-items-stretch gap-3">
                    <div class="site-contact-card">
                        <span class="site-contact-card__icon"><i class="bi bi-envelope-paper"></i></span>
                        <div>
                            <span class="site-contact-card__label">Email</span>
                            <a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a>
                        </div>
                    </div>

                    <div class="site-contact-card">
                        <span class="site-contact-card__icon"><i class="bi bi-telephone-fill"></i></span>
                        <div>
                            <span class="site-contact-card__label">Call now</span>
                            <a href="tel:<?php echo CONTACT_PHONE; ?>"><?php echo CONTACT_PHONE; ?></a>
                        </div>
                    </div>

                    <a class="site-cta-button" href="<?php echo url('/membership'); ?>">Join us</a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark site-navbar" aria-label="Primary navigation">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-lg-auto align-items-lg-center site-nav-links">
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/') && getCurrentPath() === '/' ? 'active' : ''; ?>" href="<?php echo url('/'); ?>" <?php echo isActive('/') && getCurrentPath() === '/' ? 'aria-current="page"' : ''; ?>>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/about'); ?>" href="<?php echo url('/about'); ?>" <?php echo isActive('/about') ? 'aria-current="page"' : ''; ?>>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/events'); ?>" href="<?php echo url('/events'); ?>" <?php echo isActive('/events') ? 'aria-current="page"' : ''; ?>>Upcoming Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/gallery'); ?>" href="<?php echo url('/gallery'); ?>" <?php echo isActive('/gallery') ? 'aria-current="page"' : ''; ?>>Media Resources</a>
                    </li>
                    <li class="nav-item dropdown site-nav-dropdown">
                        <a class="nav-link dropdown-toggle <?php echo isActive('/membership'); ?>" href="#" id="membersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" <?php echo isActive('/membership') ? 'aria-current="page"' : ''; ?>>
                            Members Area
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="membersDropdown">
                            <li><a class="dropdown-item" href="<?php echo url('/membership'); ?>">Member List</a></li>
                            <li><a class="dropdown-item" href="<?php echo url('/about'); ?>#officials">Working Members</a></li>
                            <li><a class="dropdown-item" href="<?php echo url('/membership'); ?>">Join As A Member</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/contact'); ?>" href="<?php echo url('/contact'); ?>" <?php echo isActive('/contact') ? 'aria-current="page"' : ''; ?>>Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/terms'); ?>" href="<?php echo url('/terms'); ?>" <?php echo isActive('/terms') ? 'aria-current="page"' : ''; ?>>Terms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo isActive('/privacy-policy'); ?>" href="<?php echo url('/privacy-policy'); ?>" <?php echo isActive('/privacy-policy') ? 'aria-current="page"' : ''; ?>>Privacy</a>
                    </li>
                </ul>

                <div class="site-nav-actions d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-2 ms-lg-3">
                    <?php if (isLoggedIn()): ?>
                        <?php if (isAdmin()): ?>
                            <a class="site-nav-button site-nav-button--ghost" href="<?php echo url('/admin'); ?>">Admin</a>
                        <?php endif; ?>

                        <div class="dropdown">
                            <a class="site-user-chip dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($_SESSION['user_name']); ?>&size=32&background=667eea&color=fff"
                                     alt="<?php echo htmlspecialchars($_SESSION['user_name']); ?>">
                                <span><?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li><a class="dropdown-item" href="<?php echo url('/profile'); ?>"><i class="bi bi-person-circle me-2"></i>My Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="<?php echo url('/logout'); ?>"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <?php $returnTo = getReturnToPath('/'); ?>
                        <a class="site-nav-button site-nav-button--primary" href="<?php echo url('/login?return_to=' . urlencode($returnTo)); ?>">Login</a>
                        <a class="site-nav-button site-nav-button--ghost" href="<?php echo url('/register?return_to=' . urlencode($returnTo)); ?>">Register</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>