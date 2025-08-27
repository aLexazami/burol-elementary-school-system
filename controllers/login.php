<?php
// Enable error reporting for debugging purposes
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../includes/bootstrap.php'; // Loads Dotenv and autoload
session_start();

// Include the database connection file
require_once __DIR__ . '/../config/database.php';

// Initialize login attempt counter
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = isset($_POST['username']) ? htmlspecialchars(trim($_POST['username'])) : '';
    $password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';

    if (empty($username) || empty($password)) {
        $_SESSION['error_message'] = 'Username and password are required.';
        $_SESSION['login_attempts']++;
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
            // Reset login attempts on successful login
            $_SESSION['login_attempts'] = 0;

            // Set session variables
            $_SESSION['login_attempts'] = 0; // ✅ Reset on successful login
            $_SESSION['user_token'] = hash('sha256', $_ENV['SESSION_SECRET']);
            $_SESSION['username']   = $user['username'];
            $_SESSION['firstName']  = $user['first_name'];
            $_SESSION['lastName']   = $user['last_name'];
            $_SESSION['role_name']  = $user['role_name'];

            // Role-based redirection
            $roleRedirects = [
                1 => '../pages/main-staff.php',
                2 => '../pages/main-admin.php',
                3 => '../pages/main-super-admin.php',
            ];

            if (isset($roleRedirects[$user['role_id']])) {
                header("Location: " . $roleRedirects[$user['role_id']]);
            } else {
                $_SESSION['error_message'] = 'User role not recognized.';
                header("Location: ../index.php");
            }
            exit;
        } else {
            $_SESSION['error_message'] = 'Invalid username or password.';
            $_SESSION['login_attempts']++;
            header("Location: ../index.php");
            exit();
        }
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $_SESSION['error_message'] = 'An error occurred. Please try again later.';
        $_SESSION['login_attempts']++;
        header("Location: ../index.php");
        exit();
    }
}
?>