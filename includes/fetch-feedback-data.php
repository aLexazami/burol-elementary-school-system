<?php
require_once '../../db-connection.php';

$stmt = $pdo->query("
  SELECT r.id, r.name, r.date, r.age, r.sex, r.customer_type, r.service_availed, r.region, r.submitted_at,
         a.citizen_charter_awareness, a.cc1, a.cc2, a.cc3,
         a.sqd1, a.sqd2, a.sqd3, a.sqd4, a.sqd5, a.sqd6, a.sqd7, a.sqd8, a.remarks
  FROM feedback_respondents r
  JOIN feedback_answers a ON r.id = a.respondent_id
  ORDER BY r.submitted_at DESC
");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>