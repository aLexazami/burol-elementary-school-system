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

function getAgeGroupCounts($pdo) {
    $sql = "
        SELECT
            CASE
                WHEN age <= 19 THEN 'under-19'
                WHEN age BETWEEN 20 AND 34 THEN '20-34'
                WHEN age BETWEEN 35 AND 49 THEN '35-49'
                WHEN age BETWEEN 50 AND 64 THEN '50-64'
                ELSE '65-up'
            END AS age_group,
            COUNT(*) AS count
        FROM feedback_respondents
        GROUP BY age_group
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $counts = [
        'under-19' => 0,
        '20-34' => 0,
        '35-49' => 0,
        '50-64' => 0,
        '65-up' => 0
    ];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $counts[$row['age_group']] = $row['count'];
    }

    return $counts;
}

?>