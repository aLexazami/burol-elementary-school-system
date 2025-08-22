<?php
function getRespondentCount($type, $pdo) {
  switch ($type) {
    case 'new':
      $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE DATE(submitted_at) = CURDATE()";
      break;
    case 'weekly':
      $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE YEARWEEK(submitted_at, 1) = YEARWEEK(CURDATE(), 1)";
      break;
    case 'annual':
      $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE YEAR(submitted_at) = YEAR(CURDATE())";
      break;
    default:
      return 0;
  }

  return $pdo->query($sql)->fetchColumn();
}
?>