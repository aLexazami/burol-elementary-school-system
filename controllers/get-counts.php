<?php
require_once '../db-connection.php';
require_once '../includes/functions.php';

header('Content-Type: application/json');

$response = [
    'new' => getRespondentCount('new', $pdo),
    'weekly' => getRespondentCount('weekly', $pdo),
    'annual' => getRespondentCount('annual', $pdo)
];

$customerCounts = getCustomerTypeCounts($pdo);
$response = array_merge($response, $customerCounts);
$response = array_merge($response, getAgeGroupCounts($pdo));
$response = array_merge($response, getCharterAwarenessCounts($pdo));
$response = array_merge($response, getCitizenCharterResponses($pdo));
$response = array_merge($response, getSQDMatrixCounts($pdo));

echo json_encode($response);
?>