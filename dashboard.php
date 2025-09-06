<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit();
}

include 'includes/db.php';

// Get user information
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kerala PSC | Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0052cc;
            --primary-light: #e6f0ff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: #f5f5f5;
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
            text-decoration: none;
            transition: 0.3s;
        }

        nav .btn:hover {
            background: var(--primary-light);
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .welcome-card {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .card h3 {
            color: var(--primary);
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Kerala PSC</div>
        <nav>
            <a href="index.php" class="btn">Home</a>
            <a href="logout.php" class="btn">Logout</a>
        </nav>
    </header>

    <div class="dashboard-container">
        <div class="welcome-card">
            <h1>Welcome, <?php echo htmlspecialchars($user['username'] ?? 'User'); ?>!</h1>
            <p>Manage your PSC applications and stay updated with notifications.</p>
        </div>

        <div class="dashboard-grid">
            <div class="card">
                <h3>My Applications</h3>
                <p>View and track your submitted applications.</p>
                <button class="btn" style="margin-top: 1rem;">View Applications</button>
            </div>

            <div class="card">
                <h3>Notifications</h3>
                <p>Stay updated with latest PSC notifications.</p>
                <button class="btn" style="margin-top: 1rem;">View Notifications</button>
            </div>

            <div class="card">
                <h3>Profile Settings</h3>
                <p>Update your personal information and preferences.</p>
                <button class="btn" style="margin-top: 1rem;">Edit Profile</button>
            </div>

            <div class="card">
                <h3>Help & Support</h3>
                <p>Get help with your applications and account.</p>
                <button class="btn" style="margin-top: 1rem;">Contact Support</button>
            </div>
        </div>
    </div>
</body>
</html> 