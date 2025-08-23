<?php
session_start();
require_once __DIR__ . '/config.php';

if (!isset($_SESSION['username'])) {
header("Location: " . BASE_URL . "index.php");
exit();
}
?>
