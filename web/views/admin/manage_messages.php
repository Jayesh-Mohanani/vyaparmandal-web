<?php /**Manage Messages Page*/ ?>
<section class="py-4 bg-light border-bottom admin-page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0"><i class="bi bi-envelope me-2"></i>Contact Messages</h2>
                <p class="text-muted mb-0">View and manage all contact form submissions</p>
            </div>
            <div class="col-md-6">
                <div class="admin-page-actions">
                    <a href="<?php echo url('/admin'); ?>" class="admin-back-link">
                        <i class="bi bi-speedometer2"></i>Dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container-fluid">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($messages)): ?>
                                <?php foreach ($messages as $message): ?>
                                    <tr>
                                        <td><?php echo $message['id']; ?></td>
                                        <td><strong><?php echo htmlspecialchars($message['name']); ?></strong></td>
                                        <td><?php echo htmlspecialchars($message['email']); ?></td>
                                        <td><?php echo htmlspecialchars($message['subject']); ?></td>
                                        <td><small><?php echo formatDate($message['created_at']); ?></small></td>
                                        <td><span class="badge bg-<?php echo $message['status'] === 'new' ? 'primary' : 'success'; ?>"><?php echo ucfirst($message['status']); ?></span></td>
                                        <td>
                                            <a href="<?php echo url('/admin/messages/' . $message['id']); ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-5">
                                        <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                        No messages found
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
