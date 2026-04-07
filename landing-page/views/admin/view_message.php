<?php /**View Message Page*/ ?>
<section class="py-4 bg-light border-bottom admin-page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h2 class="mb-0"><i class="bi bi-envelope-open me-2"></i>Message Details</h2>
                <p class="text-muted mb-0">Contact form submission</p>
            </div>
            <div class="col-md-6">
                <div class="admin-page-actions">
                    <a href="<?php echo url('/admin'); ?>" class="admin-back-link">
                        <i class="bi bi-speedometer2"></i>Dashboard
                    </a>
                    <a href="<?php echo url('/admin/messages'); ?>" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-2"></i>Back to Messages
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
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="text-muted small">From</label>
                                <p class="fw-bold"><?php echo htmlspecialchars($message['name']); ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small">Email</label>
                                <p class="fw-bold">
                                    <a href="mailto:<?php echo htmlspecialchars($message['email']); ?>">
                                        <?php echo htmlspecialchars($message['email']); ?>
                                    </a>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small">Phone</label>
                                <p class="fw-bold"><?php echo htmlspecialchars($message['phone'] ?? 'Not provided'); ?></p>
                            </div>
                            <div class="col-md-6">
                                <label class="text-muted small">Date</label>
                                <p class="fw-bold"><?php echo formatDate($message['created_at'], 'd M Y, h:i A'); ?></p>
                            </div>
                            <div class="col-12">
                                <label class="text-muted small">Subject</label>
                                <p class="fw-bold"><?php echo htmlspecialchars($message['subject']); ?></p>
                            </div>
                            <div class="col-12">
                                <label class="text-muted small">Message</label>
                                <div class="p-3 bg-light rounded">
                                    <p class="mb-0"><?php echo nl2br(htmlspecialchars($message['message'])); ?></p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <a href="mailto:<?php echo htmlspecialchars($message['email']); ?>" class="btn btn-primary">
                            <i class="bi bi-reply me-2"></i>Reply via Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
