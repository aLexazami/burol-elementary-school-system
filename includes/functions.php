<?php
function getRespondentCount($type, $pdo) {
  $query = "";

  switch ($type) {
    case 'new':
      $query = "SELECT COUNT(*) FROM feedback_respondents WHERE DATE(submitted_at) = CURDATE()";
      break;
    case 'weekly':
      $query = "SELECT COUNT(*) FROM feedback_respondents WHERE YEARWEEK(submitted_at, 1) = YEARWEEK(CURDATE(), 1)";
      break;
    case 'annual':
      $query = "SELECT COUNT(*) FROM feedback_respondents WHERE YEAR(submitted_at) = YEAR(CURDATE())";
      break;
    default:
      return 0;
  }

  $stmt = $pdo->query($query);
  return $stmt->fetchColumn();
}
?>