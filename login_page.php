<?php include 'includes/header.php'; ?>

<main class="auth-container">
  <section class="login-form">
    <h2>Login to Kerala PSC</h2>
    <?php
      if (isset($_GET['error'])) {
        echo '<p class="error-msg">' . htmlspecialchars($_GET['error']) . '</p>';
      }
    ?>
    <form action="process_login.php" method="POST">
      <label for="email">Email or Username</label>
      <input type="text" id="email" name="email" required>

      <label for="password">Password</label>
      <input type="password" id="password" name="password" required>

      <button type="submit" class="btn">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </section>
</main>

<style>
  .auth-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 80vh;
    background: linear-gradient(to right, #e6f0ff, #ffffff);
  }

  .login-form {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
  }

  .login-form h2 {
    margin-bottom: 1.5rem;
    color: var(--primary);
    text-align: center;
  }

  .login-form label {
    display: block;
    margin-top: 1rem;
    font-weight: 600;
  }

  .login-form input {
    width: 100%;
    padding: 0.5rem;
    margin-top: 0.5rem;
    border: 1px solid #ccc;
    border-radius: 6px;
  }

  .login-form .btn {
    width: 100%;
    margin-top: 1.5rem;
    padding: 0.75rem;
    background: var(--primary);
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
  }

  .login-form p {
    text-align: center;
    margin-top: 1rem;
  }

  .error-msg {
    background: #ffd5d5;
    color: #b20000;
    padding: 0.5rem;
    border-radius: 6px;
    text-align: center;
    margin-bottom: 1rem;
  }
</style>

<?php include 'includes/footer.php'; ?>
