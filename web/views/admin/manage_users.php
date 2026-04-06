<?php
/**
 * Manage Users Page
 * Admin view for user management
 */
?>

<!-- Page Header -->
<section class="py-4 bg-light border-bottom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0">
                    <i class="bi bi-people me-2"></i>Manage Users
                </h2>
                <p class="text-muted mb-0">View and manage all registered users</p>
            </div>
        </div>
    </div>
</section>

<!-- Users List -->
<section class="py-4">
    <div class="container-fluid">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 5%;">ID</th>
                                <th style="width: 25%;">Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Role</th>
                                <th>Joined</th>
                                <th style="width: 15%;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($users)): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?php echo $user['id']; ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&size=40&background=random"
                                                     alt="<?php echo htmlspecialchars($user['name']); ?>"
                                                     class="rounded-circle me-2"
                                                     width="40"
                                                     height="40">
                                                <strong><?php echo htmlspecialchars($user['name']); ?></strong>
                                            </div>
                                        </td>
                                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                                        <td><?php echo htmlspecialchars($user['phone'] ?? 'N/A'); ?></td>
                                        <td>
                                            <span class="badge bg-<?php echo $user['role'] === 'admin' ? 'danger' : 'primary'; ?>">
                                                <?php echo ucfirst($user['role']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <small><?php echo formatDate($user['created_at'], 'd M Y'); ?></small>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo url('/admin/users/edit/' . $user['id']); ?>" class="btn btn-outline-primary" title="Edit">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <?php if ($user['id'] != getCurrentUserId()): ?>
                                                    <a href="<?php echo url('/admin/users/delete/' . $user['id']); ?>" class="btn btn-outline-danger" data-confirm-delete title="Delete">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        <i class="bi bi-people fs-1 d-block mb-3"></i>
                                        No users found
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
