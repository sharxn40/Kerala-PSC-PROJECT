<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerala PSC - Public Service Commission</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0052cc;
            --primary-dark: #003d99;
            --primary-light: #e6f0ff;
            --secondary: #28a745;
            --warning: #ffc107;
            --danger: #dc3545;
            --dark: #343a40;
            --light: #f8f9fa;
            --white: #ffffff;
            --border: #dee2e6;
            --text-primary: #212529;
            --text-secondary: #6c757d;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            color: var(--text-primary);
            background: var(--white);
        }

        /* Header Styles */
        .header {
            background: var(--primary);
            color: var(--white);
            padding: 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .header-top {
            background: var(--primary-dark);
            padding: 0.5rem 0;
            font-size: 0.875rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .header-top-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info {
            display: flex;
            gap: 2rem;
        }

        .contact-info span {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .user-actions {
            display: flex;
            gap: 1rem;
        }

        .user-actions a {
            color: var(--white);
            text-decoration: none;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .user-actions a:hover {
            background: rgba(255,255,255,0.1);
        }

        .header-main {
            padding: 1rem 0;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--primary);
            font-size: 1.5rem;
        }

        .logo-text h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .logo-text p {
            font-size: 0.875rem;
            opacity: 0.9;
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            font-size: 0.875rem;
        }

        .btn-primary {
            background: var(--white);
            color: var(--primary);
        }

        .btn-primary:hover {
            background: var(--primary-light);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: transparent;
            color: var(--white);
            border: 2px solid var(--white);
        }

        .btn-secondary:hover {
            background: var(--white);
            color: var(--primary);
        }

        .btn-success {
            background: var(--secondary);
            color: var(--white);
        }

        .btn-success:hover {
            background: #218838;
        }

        /* Navigation */
        .navigation {
            background: var(--primary-dark);
            padding: 0;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu li {
            position: relative;
        }

        .nav-menu a {
            display: block;
            padding: 1rem 1.5rem;
            color: var(--white);
            text-decoration: none;
            transition: background 0.3s;
            font-weight: 500;
        }

        .nav-menu a:hover {
            background: rgba(255,255,255,0.1);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--white) 100%);
            padding: 4rem 0;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .hero-text h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1rem;
            line-height: 1.2;
        }

        .hero-text p {
            font-size: 1.125rem;
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-image {
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* Quick Links */
        .quick-links {
            padding: 3rem 0;
            background: var(--light);
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h3 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .section-title p {
            color: var(--text-secondary);
            font-size: 1.125rem;
        }

        .links-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .link-card {
            background: var(--white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
        }

        .link-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }

        .link-card-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: var(--primary);
        }

        .link-card h4 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.75rem;
        }

        .link-card p {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        /* Notifications */
        .notifications {
            padding: 3rem 0;
        }

        .notifications-content {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 3rem;
        }

        .notification-item {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: box-shadow 0.3s;
        }

        .notification-item:hover {
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .notification-header {
            display: flex;
            justify-content: between;
            align-items: flex-start;
            margin-bottom: 0.75rem;
        }

        .notification-title {
            font-weight: 600;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .notification-date {
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .notification-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.875rem;
            color: var(--text-secondary);
            margin-top: 0.75rem;
        }

        .sidebar {
            background: var(--light);
            padding: 2rem;
            border-radius: 12px;
            height: fit-content;
        }

        .sidebar h4 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .sidebar-links {
            list-style: none;
        }

        .sidebar-links li {
            margin-bottom: 0.75rem;
        }

        .sidebar-links a {
            color: var(--text-primary);
            text-decoration: none;
            padding: 0.5rem 0;
            display: block;
            border-bottom: 1px solid var(--border);
            transition: color 0.3s;
        }

        .sidebar-links a:hover {
            color: var(--primary);
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: var(--white);
            padding: 3rem 0 1rem;
            margin-top: 3rem;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            margin-bottom: 1rem;
            color: var(--white);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--white);
        }

        .footer-bottom {
            border-top: 1px solid #495057;
            padding-top: 1rem;
            text-align: center;
            color: #adb5bd;
        }

        /* Success/Error Messages */
        .alert {
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 6px;
            text-align: center;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .header-top-content {
                flex-direction: column;
                gap: 0.5rem;
            }

            .contact-info {
                flex-direction: column;
                gap: 0.5rem;
            }

            .header-content {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .nav-menu {
                flex-direction: column;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h2 {
                font-size: 2rem;
            }

            .notifications-content {
                grid-template-columns: 1fr;
            }

            .auth-buttons {
                flex-direction: column;
                width: 100%;
            }

            .hero-buttons {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <!-- Header Top -->
        <div class="header-top">
            <div class="container">
                <div class="header-top-content">
                    <div class="contact-info">
                        <span>📞 0471-2546400</span>
                        <span>✉️ keralapsc@gov.in</span>
                    </div>
                    <div class="user-actions">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="dashboard.php">Dashboard</a>
                            <a href="logout.php">Logout</a>
                        <?php else: ?>
                            <a href="login_page.php">Login</a>
                            <a href="register.php">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->
        <div class="header-main">
            <div class="container">
                <div class="header-content">
                    <div class="logo-section">
                        <div class="logo">PSC</div>
                        <div class="logo-text">
                            <h1>Kerala PSC</h1>
                            <p>Public Service Commission</p>
                        </div>
                    </div>
                    <div class="auth-buttons">
                        <?php if (isset($_SESSION['user_id'])): ?>
                            <a href="dashboard.php" class="btn btn-success">My Dashboard</a>
                            <a href="logout.php" class="btn btn-secondary">Logout</a>
                        <?php else: ?>
                            <a href="login_page.php" class="btn btn-primary">Login</a>
                            <a href="register.php" class="btn btn-secondary">Register Now</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="navigation">
            <div class="container">
                <ul class="nav-menu">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#notifications">Notifications</a></li>
                    <li><a href="#examinations">Examinations</a></li>
                    <li><a href="#results">Results</a></li>
                    <li><a href="#downloads">Downloads</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Success/Error Messages -->
    <?php if (isset($_GET['success'])): ?>
        <div class="container">
            <div class="alert alert-success">
                <?php echo htmlspecialchars($_GET['success']); ?>
            </div>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
        <div class="container">
            <div class="alert alert-error">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h2>Welcome to Kerala PSC Portal</h2>
                    <p>Your gateway to government job opportunities in Kerala. Apply for examinations, track your applications, and stay updated with the latest notifications.</p>
                    <div class="hero-buttons">
                        <?php if (!isset($_SESSION['user_id'])): ?>
                            <a href="register.php" class="btn btn-primary">Register Now</a>
                            <a href="login_page.php" class="btn btn-secondary">Login</a>
                        <?php else: ?>
                            <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.pexels.com/photos/5668858/pexels-photo-5668858.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Kerala PSC Building" />
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Links -->
    <section class="quick-links">
        <div class="container">
            <div class="section-title">
                <h3>Quick Access</h3>
                <p>Everything you need for your PSC journey</p>
            </div>
            <div class="links-grid">
                <div class="link-card">
                    <div class="link-card-icon">📋</div>
                    <h4>Apply Online</h4>
                    <p>Submit your applications for various PSC examinations online</p>
                    <a href="<?php echo isset($_SESSION['user_id']) ? 'dashboard.php' : 'register.php'; ?>" class="btn btn-primary">Get Started</a>
                </div>
                <div class="link-card">
                    <div class="link-card-icon">📊</div>
                    <h4>Check Results</h4>
                    <p>View your examination results and rank lists</p>
                    <a href="#results" class="btn btn-primary">View Results</a>
                </div>
                <div class="link-card">
                    <div class="link-card-icon">📅</div>
                    <h4>Exam Schedule</h4>
                    <p>Stay updated with upcoming examination dates</p>
                    <a href="#examinations" class="btn btn-primary">View Schedule</a>
                </div>
                <div class="link-card">
                    <div class="link-card-icon">📄</div>
                    <h4>Download Forms</h4>
                    <p>Access application forms and important documents</p>
                    <a href="#downloads" class="btn btn-primary">Downloads</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Notifications -->
    <section class="notifications" id="notifications">
        <div class="container">
            <div class="section-title">
                <h3>Latest Notifications</h3>
                <p>Stay updated with the latest job openings and announcements</p>
            </div>
            <div class="notifications-content">
                <div class="notifications-list">
                    <div class="notification-item">
                        <div class="notification-header">
                            <div>
                                <div class="notification-title">Assistant Engineer (Civil) - Various Departments</div>
                                <div class="notification-date">Published: January 15, 2025</div>
                            </div>
                        </div>
                        <p>Applications are invited for the post of Assistant Engineer (Civil) in various government departments.</p>
                        <div class="notification-meta">
                            <span>📅 Last Date: February 15, 2025</span>
                            <span>👥 Vacancies: 45</span>
                            <span>🎓 Qualification: B.Tech Civil</span>
                        </div>
                    </div>

                    <div class="notification-item">
                        <div class="notification-header">
                            <div>
                                <div class="notification-title">Junior Instructor - ITI</div>
                                <div class="notification-date">Published: January 12, 2025</div>
                            </div>
                        </div>
                        <p>Recruitment for Junior Instructor positions in Industrial Training Institutes across Kerala.</p>
                        <div class="notification-meta">
                            <span>📅 Last Date: February 10, 2025</span>
                            <span>👥 Vacancies: 120</span>
                            <span>🎓 Qualification: ITI + NCVT</span>
                        </div>
                    </div>

                    <div class="notification-item">
                        <div class="notification-header">
                            <div>
                                <div class="notification-title">High School Teacher - Mathematics</div>
                                <div class="notification-date">Published: January 10, 2025</div>
                            </div>
                        </div>
                        <p>Applications for High School Teacher (Mathematics) in Government Schools.</p>
                        <div class="notification-meta">
                            <span>📅 Last Date: February 8, 2025</span>
                            <span>👥 Vacancies: 85</span>
                            <span>🎓 Qualification: B.Sc + B.Ed</span>
                        </div>
                    </div>
                </div>

                <div class="sidebar">
                    <h4>Important Links</h4>
                    <ul class="sidebar-links">
                        <li><a href="#syllabus">Exam Syllabus</a></li>
                        <li><a href="#previous-papers">Previous Question Papers</a></li>
                        <li><a href="#admit-card">Admit Card</a></li>
                        <li><a href="#answer-key">Answer Keys</a></li>
                        <li><a href="#rank-list">Rank Lists</a></li>
                        <li><a href="#interview-schedule">Interview Schedule</a></li>
                        <li><a href="#contact">Help & Support</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Kerala PSC</h4>
                    <p>The Kerala Public Service Commission is the central recruiting agency for appointment to the civil services of the state of Kerala.</p>
                </div>
                <div class="footer-section">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="#notifications">Notifications</a></li>
                        <li><a href="#examinations">Examinations</a></li>
                        <li><a href="#results">Results</a></li>
                        <li><a href="#downloads">Downloads</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Contact Info</h4>
                    <ul>
                        <li>📍 Pattom Palace, Thiruvananthapuram</li>
                        <li>📞 0471-2546400</li>
                        <li>✉️ keralapsc@gov.in</li>
                        <li>🌐 www.keralapsc.gov.in</li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Help & Support</h4>
                    <ul>
                        <li><a href="#faq">FAQ</a></li>
                        <li><a href="#user-manual">User Manual</a></li>
                        <li><a href="#technical-support">Technical Support</a></li>
                        <li><a href="#feedback">Feedback</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Kerala Public Service Commission. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Auto-hide success/error messages after 5 seconds
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(alert => {
                alert.style.opacity = '0';
                alert.style.transition = 'opacity 0.5s';
                setTimeout(() => alert.remove(), 500);
            });
        }, 5000);
    </script>
</body>
</html>