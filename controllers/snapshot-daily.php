<?php
require_once '../db-connection.php';
require_once '../include/functions.php';

insertSnapshot('daily', $conn);

// Optional: log the result
file_put_contents('snapshot-log.txt', "Daily snapshot inserted at " . date('Y-m-d H:i:s') . "\n", FILE_APPEND);
?>