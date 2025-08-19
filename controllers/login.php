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
    $stmt = $conn->prepare("
  SELECT users.*, roles.name
  FROM users
  JOIN roles ON users.role_id = roles.id
  WHERE users.username = ?
");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
      $user = $result->fetch_assoc();

      if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['firstName'] = $user['first_name'];
        $_SESSION['lastName'] = $user['last_name'];
        $_SESSION['role'] = $user['name']; // role name from roles table

        /*
        // ✅ TEMPORARY: Show styled user info
        echo '<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">';
        echo '<body class="bg-gray-100">';
        // Insert styled block here
        echo '
<div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md border border-gray-200">
  <h2 class="text-2xl font-semibold text-gray-800 mb-4">User Details</h2>
  <ul class="space-y-2">';

        foreach ($user as $key => $value) {
          if ($key !== 'password') {
            echo '<li class="flex justify-between items-center text-gray-700">
            <span class="font-medium capitalize">' . htmlspecialchars($key) . '</span>
            <span>' . htmlspecialchars($value) . '</span>
          </li>';
          }
        }

        echo '
  </ul>
</div>';
        exit();
        */


        switch ($user['name']) {
          case 'Staff':
            header("Location: ../pages/main-staff.php");
            break;
          case 'Admin':
            header("Location: ../pages/main-admin.php");
            break;
          case 'Super Admin':
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
    } else {
      $_SESSION['error_message'] = 'Invalid username or password.';
      header("Location: ../index.php");
      exit();
    }
  } catch (Exception $e) {
    error_log($e->getMessage());
    $_SESSION['error_message'] = 'An error occurred. Please try again later.';
    header("Location: ../index.php");
    exit();
  } finally {
    if (isset($stmt)) $stmt->close();
    if (isset($conn)) $conn->close();
  }
}
