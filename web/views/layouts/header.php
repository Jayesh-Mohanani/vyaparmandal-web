<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="<?php echo APP_NAME; ?> - Empowering traders and businesses across Uttar Pradesh">
    <meta name="keywords" content="vyapar mandal, trader association, business organization, GST, trade reform, Uttar Pradesh">
    <meta name="author" content="<?php echo APP_NAME; ?>">

    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' . APP_NAME : APP_NAME; ?></title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo asset('images/favicon.ico'); ?>">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-sans">
    <!-- Include Navbar Component -->
    <?php require_once __DIR__ . '/../../components/navbar.php'; ?>

    <!-- Flash Messages -->
    <?php
    $successFlash = getFlash('success');
    $errorFlash = getFlash('error');
    $warningFlash = getFlash('warning');
    $infoFlash = getFlash('info');
    ?>

    <?php if ($successFlash): ?>
    <div class="alert alert-success alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?php echo $successFlash['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($errorFlash): ?>
    <div class="alert alert-danger alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?php echo $errorFlash['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($warningFlash): ?>
    <div class="alert alert-warning alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <?php echo $warningFlash['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <?php if ($infoFlash): ?>
    <div class="alert alert-info alert-dismissible fade show m-0 rounded-0" role="alert">
        <div class="container">
            <i class="bi bi-info-circle-fill me-2"></i>
            <?php echo $infoFlash['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <?php endif; ?>

    <!-- Main Content -->
    <main>
