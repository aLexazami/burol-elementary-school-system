<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once __DIR__ . '/../config/database.php';

  // Sanitize and collect form inputs
  $first_name   = trim($_POST['first_name']);
  $middle_name  = trim($_POST['middle_name'] ?? null);
  $last_name    = trim($_POST['last_name']);
  $username     = trim($_POST['username']);
  $email        = trim($_POST['email']);
  $raw_password = $_POST['password'];
  $role_name    = trim($_POST['role']);

  // Hash the password securely
  $password = password_hash($raw_password, PASSWORD_DEFAULT);

  // Fetch role_id dynamically from roles table
  $role_stmt = $pdo->prepare("SELECT id FROM roles WHERE name = ?");
  $role_stmt->execute([$role_name]);
  $role_id = $role_stmt->fetchColumn();

  if (!$role_id) {
    echo "Invalid role selected.";
    exit;
  }

  // Check for duplicate email or username
  $check_stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = ? OR username = ?");
  $check_stmt->execute([$email, $username]);
  if ($check_stmt->fetchColumn() > 0) {
    echo "Email or username already exists.";
    exit;
  }

  // Insert new user into users table
  $insert_stmt = $pdo->prepare("
    INSERT INTO users (first_name, middle_name, last_name, username, password, email, role_id)
    VALUES (?, ?, ?, ?, ?, ?, ?)
  ");
  $insert_stmt->execute([
    $first_name,
    $middle_name,
    $last_name,
    $username,
    $password,
    $email,
    $role_id
  ]);

  echo "✅ Account created successfully!";
}
?>