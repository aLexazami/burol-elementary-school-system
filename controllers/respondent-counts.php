<?php
require_once '../includes/functions.php';
require_once '../db-connection.php';

$newCount = getRespondentCount('new', $pdo);
$weeklyCount = getRespondentCount('weekly', $pdo);
$annualCount = getRespondentCount('annual', $pdo);
?>