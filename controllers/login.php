<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start a new session or resume the existing session
session_start();

// Include the database connection file
require_once '../db-connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
  $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';

  if (empty($username) || empty($password)) {
    $_SESSION['error_message'] = 'Username and password are required.';
    header("Location: ../index.php");
    exit();
  }

  try {
    $stmt = $pdo->prepare("
    SELECT users.*, roles.name AS role_name
    FROM users
    JOIN roles ON users.role_id = roles.id
    WHERE users.username = :username
  ");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['firstName'] = $user['first_name'];
      $_SESSION['lastName'] = $user['last_name'];
      $_SESSION['role_name'] = $user['role_name'];

      switch ($user['role_id']) {
        case 1:
          header("Location: ../pages/main-staff.php");
          break;
        case 2:
          header("Location: ../pages/main-admin.php");
          break;
        case 3:
          header("Location: ../pages/main-super-admin.php");
          break;
        default:
          $_SESSION['error_message'] = 'User role not recognized.';
          header("Location: ../index.php");
          break;
      }
      exit();
    } else {
      $_SESSION['error_message'] = 'Invalid username or password.';
      header("Location: ../index.php");
      exit();
    }
  } catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error_message'] = 'An error occurred. Please try again later.';
    header("Location: ../index.php");
    exit();
  }
}
