<?php
require_once __DIR__ . '/../includes/bootstrap.php'; // Loads Dotenv and autoload

session_start();

// 🔧 Define public pages as a constant
define('PUBLIC_PAGES', ['index.php', 'login.php', 'forgot-password.php', 'feedback-form.php', 'faqs.php']);

// 🔧 Define role-based access map
define('ROLE_ACCESS', [
    'admin'        => ['main-admin.php', 'admin-tools.php'],
    'staff'        => ['main-staff.php', 'staff-dashboard.php'],
    'super_admin'  => ['main-super-admin.php', 'super-settings.php'],
]);

// 🧠 Get current page name
$currentPage = basename($_SERVER['PHP_SELF']);

// ✅ Skip validation for public pages
if (in_array($currentPage, PUBLIC_PAGES)) {
    return;
}

// ✅ Validate login
if (!isset($_SESSION['username']) || !isset($_SESSION['role_name'])) {
    header('Location: /index.php');
    exit;
}

// ✅ Validate session token
if (!isset($_SESSION['user_token']) || $_SESSION['user_token'] !== hash('sha256', $_ENV['SESSION_SECRET'])) {
    header('Location: /login.php');
    exit;
}

// ✅ Role-based access control
$role = $_SESSION['role_name'];
if (isset(ROLE_ACCESS[$role]) && !in_array($currentPage, ROLE_ACCESS[$role])) {
    header('Location: /unauthorized.php'); // Create this page to show access denied
    exit;
}