<?php

function getRespondentCount($type, $pdo) {
    switch ($type) {
        case 'new':
            $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE DATE(submitted_at) = CURDATE()";
            break;
        case 'weekly':
            $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE submitted_at >= NOW() - INTERVAL 7 DAY";
            break;
        case 'annual':
            $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE YEAR(submitted_at) = YEAR(CURDATE())";
            break;
        default:
            return 0;
    }

    return $pdo->query($sql)->fetchColumn();
}

function getCustomerTypeCounts($pdo) {
    $sql = "SELECT customer_type, COUNT(*) AS count FROM feedback_respondents GROUP BY customer_type";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $counts = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $counts[$row['customer_type']] = $row['count'];
    }
    return $counts;
}
?>