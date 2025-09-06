<?php
session_start();

// Check if user came from successful registration
if (!isset($_SESSION['registration_success'])) {
    header("Location: register.php");
    exit();
}

$username = $_SESSION['username'] ?? 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful - Kerala PSC</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0052cc;
            --success: #28a745;
            --warning: #ffc107;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .success-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: var(--success);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            font-size: 2.5rem;
            color: white;
        }

        .success-title {
            color: var(--success);
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .success-message {
            color: #6c757d;
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .user-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 12px;
            margin-bottom: 2rem;
            text-align: left;
        }

        .user-info h3 {
            color: var(--primary);
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            font-weight: 600;
            color: #495057;
        }

        .info-value {
            color: #6c757d;
        }

        .next-steps {
            background: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            text-align: left;
        }

        .next-steps h3 {
            color: #856404;
            margin-bottom: 1rem;
            font-size: 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .next-steps ul {
            list-style: none;
            padding: 0;
        }

        .next-steps li {
            padding: 0.5rem 0;
            color: #856404;
            position: relative;
            padding-left: 1.5rem;
        }

        .next-steps li::before {
            content: '→';
            position: absolute;
            left: 0;
            color: var(--warning);
            font-weight: bold;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            min-width: 120px;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background: #0047b3;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: #6c757d;
            color: white;
        }

        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .success-container {
                padding: 2rem 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">✓</div>
        
        <h1 class="success-title">Registration Successful!</h1>
        
        <p class="success-message">
            Congratulations! Your Kerala PSC account has been created successfully. 
            You can now log in and access all the features of the portal.
        </p>

        <div class="user-info">
            <h3>Account Details</h3>
            <div class="info-row">
                <span class="info-label">Username:</span>
                <span class="info-value"><?php echo htmlspecialchars($username); ?></span>
            </div>
            <div class="info-row">
                <span class="info-label">Status:</span>
                <span class="info-value">Active</span>
            </div>
            <div class="info-row">
                <span class="info-label">Registration Date:</span>
                <span class="info-value"><?php echo date('d M Y'); ?></span>
            </div>
        </div>

        <div class="next-steps">
            <h3>📋 Next Steps</h3>
            <ul>
                <li>Log in to your account using your username and password</li>
                <li>Complete your profile with additional information</li>
                <li>Upload required documents if not already done</li>
                <li>Start applying for PSC notifications and exams</li>
                <li>Keep your contact information updated</li>
            </ul>
        </div>

        <div class="action-buttons">
            <a href="login_page.php" class="btn btn-primary">Login Now</a>
            <a href="kerala_psc_index.php" class="btn btn-secondary">Go to Homepage</a>
        </div>
    </div>

    <script>
        // Clear registration session data after showing success page
        setTimeout(() => {
            // Keep only essential session data
            <?php
            unset($_SESSION['registration_success']);
            unset($_SESSION['form_data']);
            ?>
        }, 1000);
    </script>
</body>
</html> 