<?php
function getRespondentCount($type, $conn) {
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

  $result = mysqli_query($conn, $sql);
  if ($result) {
    $row = mysqli_fetch_row($result);
    return $row[0];
  } else {
    return 0;
  }

}

function insertSnapshot($type, $conn) {
  switch ($type) {
    case 'daily':
      $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE DATE(submitted_at) = CURDATE()";
      $date = date('Y-m-d');
      break;
    case 'weekly':
      $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE YEARWEEK(submitted_at, 1) = YEARWEEK(CURDATE(), 1)";
      $date = date('Y-m-d'); // or use start of week
      break;
    case 'annual':
      $sql = "SELECT COUNT(*) FROM feedback_respondents WHERE YEAR(submitted_at) = YEAR(CURDATE())";
      $date = date('Y-m-d'); // or use Jan 1
      break;
    default:
      return false;
  }

  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_row($result);
  $count = $row[0];

  $insert = $conn->prepare("INSERT INTO respondent_snapshots (snapshot_type, count, snapshot_date) VALUES (?, ?, ?)");
  $insert->bind_param("sis", $type, $count, $date);
  return $insert->execute();

  file_put_contents('snapshot-log.txt', "Inserted $type snapshot: $count on $date\n", FILE_APPEND);
}
?>