<?php
require_once __DIR__ . '/../config/database.php';

$userId = $_GET['id'] ?? null;

if ($userId) {
  $stmt = $pdo->prepare("UPDATE users SET is_archived = 1 WHERE id = ?");
  $stmt->execute([$userId]);
  header("Location: ../pages/super-admin/manage-users.php?archived=success");
  exit();
}
?>