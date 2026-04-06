<?php
/**
 * User Profile Page
 * Display user information and membership details
 */
?>

<!-- Page Header -->
<section class="py-5 bg-gradient-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h1 class="display-4 fw-bold mb-3">My Profile</h1>
                <p class="lead">
                    Manage your account and membership information
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Profile Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-lg-3">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 text-center">
                        <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&size=120&background=random"
                             alt="<?php echo htmlspecialchars($user['name']); ?>"
                             class="rounded-circle mb-3"
                             width="120"
                             height="120">
                        <h5 class="mb-1"><?php echo htmlspecialchars($user['name']); ?></h5>
                        <p class="text-muted small mb-3">
                            <span class="badge bg-<?php echo $user['role'] === 'admin' ? 'danger' : 'primary'; ?>">
                                <?php echo ucfirst($user['role']); ?>
                            </span>
                        </p>
                        <p class="text-muted small">
                            Member since <?php echo formatDate($user['created_at'], 'M Y'); ?>
                        </p>
                    </div>
                </div>

                <div class="card border-0 shadow-sm mt-3">
                    <div class="list-group list-group-flush">
                        <a href="#profile" class="list-group-item list-group-item-action active">
                            <i class="bi bi-person me-2"></i>Profile Information
                        </a>
                        <a href="#membership" class="list-group-item list-group-item-action">
                            <i class="bi bi-card-checklist me-2"></i>Membership Details
                        </a>
                        <a href="<?php echo url('/logout'); ?>" class="list-group-item list-group-item-action text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <!-- Profile Information -->
                <div class="card border-0 shadow-sm mb-4" id="profile">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Full Name</label>
                                <p class="fw-bold"><?php echo htmlspecialchars($user['name']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Email Address</label>
                                <p class="fw-bold"><?php echo htmlspecialchars($user['email']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Phone Number</label>
                                <p class="fw-bold"><?php echo htmlspecialchars($user['phone'] ?? 'Not provided'); ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Account Type</label>
                                <p class="fw-bold">
                                    <span class="badge bg-<?php echo $user['role'] === 'admin' ? 'danger' : 'primary'; ?>">
                                        <?php echo ucfirst($user['role']); ?>
                                    </span>
                                </p>
                            </div>
                        </div>

                        <hr>

                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                            <i class="bi bi-pencil me-2"></i>Edit Profile
                        </button>
                    </div>
                </div>

                <!-- Membership Details -->
                <div class="card border-0 shadow-sm mb-4" id="membership">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0">Membership Details</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Membership Type</label>
                                <p class="fw-bold">Regular Member</p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Status</label>
                                <p class="fw-bold">
                                    <span class="badge bg-success">Active</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Member Since</label>
                                <p class="fw-bold"><?php echo formatDate($user['created_at'], 'd M Y'); ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-muted small">Next Renewal</label>
                                <p class="fw-bold"><?php echo formatDate(date('Y-m-d', strtotime('+1 year', strtotime($user['created_at']))), 'd M Y'); ?></p>
                            </div>
                        </div>

                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Your membership will be renewed automatically. To upgrade or change your plan, please contact us.
                        </div>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white border-0">
                        <h5 class="mb-0">Recent Activity</h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="list-group list-group-flush">
                            <div class="list-group-item px-0">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle text-success fs-4 me-3"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Profile Updated</h6>
                                        <small class="text-muted">2 days ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item px-0">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-calendar-check text-primary fs-4 me-3"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Registered for Event</h6>
                                        <small class="text-muted">1 week ago</small>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item px-0">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-check text-success fs-4 me-3"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0">Account Created</h6>
                                        <small class="text-muted"><?php echo formatDate($user['created_at']); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="editName" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="editName" value="<?php echo htmlspecialchars($user['name']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" value="<?php echo htmlspecialchars($user['email']); ?>">
                    </div>
                    <div class="mb-3">
                        <label for="editPhone" class="form-label">Phone</label>
                        <input type="tel" class="form-control" id="editPhone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
