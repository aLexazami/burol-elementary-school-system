<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once './db-connection.php';
require_once './includes/functions.php';

header('Content-Type: application/json');

echo json_encode([
  'new' => getRespondentCount('new', $pdo),
  'weekly' => getRespondentCount('weekly', $pdo),
  'annual' => getRespondentCount('annual', $pdo)
]);