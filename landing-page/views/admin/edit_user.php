<?php /**Edit User Page*/ ?>
<section class="py-4 bg-light border-bottom admin-page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0"><i class="bi bi-person-gear me-2"></i>Edit User</h2>
                <p class="text-muted mb-0">Modify user information and permissions</p>
            </div>
            <div class="col-md-6">
                <div class="admin-page-actions">
                    <a href="<?php echo url('/admin'); ?>" class="admin-back-link">
                        <i class="bi bi-speedometer2"></i>Dashboard
                    </a>
                    <a href="<?php echo url('/admin/users'); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to Users
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <form action="<?php echo url('/admin/users/update/' . $user['id']); ?>" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone'] ?? ''); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select class="form-select" id="role" name="role">
                                    <option value="user" <?php echo $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                                    <option value="admin" <?php echo $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
                                </select>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary me-2"><i class="bi bi-save me-2"></i>Update User</button>
                            <a href="<?php echo url('/admin/users'); ?>" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
