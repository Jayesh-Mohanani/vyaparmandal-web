<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon - <?php echo APP_NAME; ?></title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Google Fonts -->
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

        /* Animated background circles */
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

        .coming-soon-container {
            position: relative;
            z-index: 10;
            text-align: center;
            padding: 3rem;
            max-width: 700px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.6s ease-out;
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

        .icon-wrapper {
            width: 100px;
            height: 100px;
            margin: 0 auto 2rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 0 0 20px rgba(102, 126, 234, 0);
            }
        }

        .icon-wrapper i {
            font-size: 3rem;
            color: white;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 0.5rem;
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 1.5rem;
        }

        p {
            font-size: 1.1rem;
            color: #718096;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.875rem 2rem;
            font-size: 1rem;
            font-weight: 600;
            color: white;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-home:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
            color: white;
        }

        .dots {
            margin-top: 2rem;
            display: flex;
            justify-content: center;
            gap: 0.5rem;
        }

        .dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #cbd5e0;
            animation: dotPulse 1.5s ease-in-out infinite;
        }

        .dot:nth-child(2) {
            animation-delay: 0.3s;
        }

        .dot:nth-child(3) {
            animation-delay: 0.6s;
        }

        @keyframes dotPulse {
            0%, 100% {
                transform: scale(1);
                background: #cbd5e0;
            }
            50% {
                transform: scale(1.5);
                background: #667eea;
            }
        }

        @media (max-width: 768px) {
            .coming-soon-container {
                padding: 2rem 1.5rem;
                margin: 1rem;
            }

            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="coming-soon-container">
        <div class="icon-wrapper">
            <i class="bi bi-hourglass-split"></i>
        </div>

        <h1>Development in Progress</h1>
        <h2>Coming Soon!</h2>

        <p>
            We're working hard to bring you this feature.
            Stay tuned for exciting updates and improvements to enhance your experience.
        </p>

        <a href="<?php echo url('/'); ?>" class="btn-home">
            <i class="bi bi-house-door-fill"></i>
            Back to Home
        </a>

        <div class="dots">
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>
</body>
</html>
