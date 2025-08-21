<?php
// archive.php
include_once(__DIR__ . '../../db-connection.php'); // adjust path as needed

$year = $_GET['year'] ?? date('Y');
$sql = "SELECT * FROM feedback_respondents WHERE YEAR(submitted_at) = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $year);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>