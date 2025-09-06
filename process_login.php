<?php
session_start();
include 'includes/db.php'; // Ensure this file connects to your database

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = trim($_POST['email']);
  $password = trim($_POST['password']);

  // Basic validation
  if (empty($email) || empty($password)) {
    header("Location: login_page.php?error=Please fill in all fields");
    exit();
  }

  // Use prepared statements to prevent SQL injection
  $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ? OR username = ?");
  $stmt->bind_param("ss", $email, $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
      $_SESSION['user_id'] = $user['id'];
      header("Location: kerala_psc_index.php?success=Login successful");
      exit();
    } else {
      header("Location: login_page.php?error=Invalid password");
      exit();
    }
  } else {
    header("Location: login_page.php?error=User not found");
    exit();
  }
} else {
  header("Location: login_page.php");
  exit();
}
?>
