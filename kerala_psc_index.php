<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kerala PSC | Home</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #0052cc;
      --primary-light: #e6f0ff;
      --dark-bg: #121212;
      --light-text: #f4f4f4;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background: white;
      color: #222;
      transition: background 0.3s, color 0.3s;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: var(--primary);
      color: white;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    nav .btn {
      background: white;
      color: var(--primary);
      padding: 0.5rem 1rem;
      margin-left: 1rem;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      transition: 0.3s;
    }

    nav .btn-secondary {
      background: #d6e0f5;
    }

    nav .btn:hover {
      background: var(--primary-light);
    }

    .hero {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      justify-content: space-between;
      padding: 2rem;
      background: linear-gradient(to right, #e6f0ff, #ffffff);
    }

    .hero-text {
      flex: 1;
      padding: 1rem;
    }

    .hero-text h1 {
      font-size: 2.5rem;
      margin-bottom: 1rem;
    }

    .hero-text p {
      font-size: 1.2rem;
      margin-bottom: 1.5rem;
    }

    .cta-btn {
      background: var(--primary);
      color: white;
      padding: 0.75rem 1.5rem;
      border: none;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
    }

    .hero-img img {
      max-width: 100%;
      height: auto;
    }

    .features {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1rem;
      padding: 2rem;
    }

    .card {
      flex: 1 1 250px;
      background: white;
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: transform 0.2s ease;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    footer {
      background: var(--primary);
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: 2rem;
    }

    #splash-screen {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: var(--primary);
      color: white;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 1000;
      animation: fadeOut 1s ease 2.5s forwards;
    }

    .splash-content h1 {
      font-size: 3rem;
    }

    @keyframes fadeOut {
      to { opacity: 0; visibility: hidden; }
    }

    @media (max-width: 768px) {
      .hero {
        flex-direction: column;
      }

      nav {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
      }
    }
  </style>
</head>
<body>

  <!-- Splash Screen -->
  <div id="splash-screen">
    <div class="splash-content">
      <h1>Kerala PSC</h1>
      <p>Empowering Opportunities, Digitally.</p>
    </div>
  </div>

  <!-- Main Content -->
  <header>
    <div class="logo">Kerala PSC</div>
    <nav>
      <?php if (isset($_SESSION['user_id'])): ?>
        <a href="dashboard.php" class="btn">Dashboard</a>
        <a href="logout.php" class="btn btn-secondary">Logout</a>
      <?php else: ?>
        <a href="login_page.php" class="btn">Login</a>
        <a href="register.php" class="btn btn-secondary">Register</a>
      <?php endif; ?>
    </nav>
  </header>

  <main>
    <?php
      if (isset($_GET['success'])) {
        echo '<div style="background: #d4edda; color: #155724; padding: 1rem; margin: 1rem; border-radius: 6px; text-align: center;">' . htmlspecialchars($_GET['success']) . '</div>';
      }
    ?>
    <section class="hero">
      <div class="hero-text">
        <h1>Apply Smarter. Track Faster.</h1>
        <p>A seamless portal to manage all your PSC applications.</p>
        <a href="register.php" class="cta-btn">Get Started</a>
      </div>
      <div class="hero-img">
        <img src="images/psc-illustration.jpg" alt="PSC Illustration">
      </div>
    </section>

    <section class="features">
      <div class="card">
        <h3>Live Notifications</h3>
        <p>Stay updated with real-time alerts on jobs and exams.</p>
      </div>
      <div class="card">
        <h3>Step-by-Step Application</h3>
        <p>Guided forms make it easy for everyone to apply.</p>
      </div>
      <div class="card">
        <h3>Secure Dashboard</h3>
        <p>Track application status, exam schedules, and more.</p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2025 Kerala PSC. All rights reserved.</p>
  </footer>

</body>
</html>
