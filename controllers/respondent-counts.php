<?php
require_once 'functions.php'; // if not already included
global $pdo;

$newCount = getRespondentCount('new', $pdo);
$weeklyCount = getRespondentCount('weekly', $pdo);
$annualCount = getRespondentCount('annual', $pdo);
?>