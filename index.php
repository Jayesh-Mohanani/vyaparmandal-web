<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyaparmandal - Version Selector</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        /* Animated background */
        body::before,
        body::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            animation: float 6s ease-in-out infinite;
        }

        body::before {
            width: 300px;
            height: 300px;
            top: -100px;
            left: -100px;
            animation-delay: 0s;
        }

        body::after {
            width: 400px;
            height: 400px;
            bottom: -150px;
            right: -150px;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% {
                transform: translateY(0) scale(1);
            }
            50% {
                transform: translateY(-20px) scale(1.1);
            }
        }

        .version-container {
            position: relative;
            z-index: 10;
            max-width: 1200px;
            width: 100%;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 4rem;
            color: white;
            animation: slideDown 0.6s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .versions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .version-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .version-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .card-header h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .card-header .icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .card-body {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-description {
            color: #718096;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .badge-list {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .badge {
            background: #edf2f7;
            color: #2d3748;
            padding: 0.35rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .btn-visit {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.875rem 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        .btn-visit:hover {
            transform: scale(1.05);
            color: white;
            text-decoration: none;
        }

        .btn-visit:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        .status-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-top: 0.5rem;
        }

        .status-badge.active {
            background: #c6f6d5;
            color: #22543d;
        }

        .status-badge.soon {
            background: #fed7d7;
            color: #742a2a;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .header p {
                font-size: 1rem;
            }

            .versions-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .card-header h3 {
                font-size: 1.5rem;
            }

            .card-header .icon {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="version-container">
        <div class="header">
            <h1>Vyaparmandal</h1>
            <p>Select a version to get started</p>
        </div>

        <div class="versions-grid">
            <!-- Landing Page -->
            <div class="version-card">
                <div class="card-header">
                    <div class="icon"><i class="bi bi-house-door-fill"></i></div>
                    <h3>Landing Page</h3>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-description">
                            The main public-facing website with all features including events, gallery, membership registration, and contact form.
                        </p>
                        <div class="badge-list">
                            <span class="badge"><i class="bi bi-check-circle"></i> Production Ready</span>
                            <span class="badge"><i class="bi bi-lightning"></i> Latest</span>
                        </div>
                    </div>
                    <a href="./landing-page/" class="btn-visit">
                        <i class="bi bi-arrow-right"></i>
                        Open Landing Page
                    </a>
                    <span class="status-badge active"><i class="bi bi-check-circle"></i> Active</span>
                </div>
            </div>

            <!-- Web Version -->
            <div class="version-card">
                <div class="card-header">
                    <div class="icon"><i class="bi bi-globe"></i></div>
                    <h3>Web Version</h3>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-description">
                            Mirror of the landing page. Currently identical to the landing page. Will be used for A/B testing and alternative layouts in the future.
                        </p>
                        <div class="badge-list">
                            <span class="badge"><i class="bi bi-info-circle"></i> Copy of Landing</span>
                            <span class="badge"><i class="bi bi-clock"></i> Testing</span>
                        </div>
                    </div>
                    <a href="./web/" class="btn-visit">
                        <i class="bi bi-arrow-right"></i>
                        Open Web Version
                    </a>
                    <span class="status-badge active"><i class="bi bi-check-circle"></i> Active</span>
                </div>
            </div>

            <!-- Staging (Coming Soon) -->
            <div class="version-card">
                <div class="card-header">
                    <div class="icon"><i class="bi bi-tools"></i></div>
                    <h3>Staging</h3>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-description">
                            Pre-production environment for testing new features and updates before deploying to production.
                        </p>
                        <div class="badge-list">
                            <span class="badge"><i class="bi bi-hourglass"></i> Coming Soon</span>
                        </div>
                    </div>
                    <button class="btn-visit" disabled>
                        <i class="bi bi-lock"></i>
                        Coming Soon
                    </button>
                    <span class="status-badge soon"><i class="bi bi-clock"></i> Not Available</span>
                </div>
            </div>

            <!-- Features Testing (Coming Soon) -->
            <div class="version-card">
                <div class="card-header">
                    <div class="icon"><i class="bi bi-code-square"></i></div>
                    <h3>Features Testing</h3>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-description">
                            Development environment for testing and QA of new features in active development.
                        </p>
                        <div class="badge-list">
                            <span class="badge"><i class="bi bi-hourglass"></i> Coming Soon</span>
                        </div>
                    </div>
                    <button class="btn-visit" disabled>
                        <i class="bi bi-lock"></i>
                        Coming Soon
                    </button>
                    <span class="status-badge soon"><i class="bi bi-clock"></i> Not Available</span>
                </div>
            </div>

            <!-- Production (Coming Soon) -->
            <div class="version-card">
                <div class="card-header">
                    <div class="icon"><i class="bi bi-rocket-takeoff"></i></div>
                    <h3>Production</h3>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-description">
                            Live production environment for the end users. Optimized and stable version.
                        </p>
                        <div class="badge-list">
                            <span class="badge"><i class="bi bi-hourglass"></i> Coming Soon</span>
                        </div>
                    </div>
                    <button class="btn-visit" disabled>
                        <i class="bi bi-lock"></i>
                        Coming Soon
                    </button>
                    <span class="status-badge soon"><i class="bi bi-clock"></i> Not Available</span>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
