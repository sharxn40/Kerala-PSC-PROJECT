<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kerala PSC | Registration</title>
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
  </style>
</head>
<body>
  <header>
    <div class="logo">Kerala PSC</div>
    <nav>
      <a href="kerala_psc_index.php" class="btn">Home</a>
      <a href="login_page.php" class="btn">Login</a>
    </nav>
  </header> 