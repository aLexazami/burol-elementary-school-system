<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../db-connection.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {

  // Respondent Info
  $name = $_POST['name'] ?? null;
  $date = $_POST['date'] ?? null;
  $age = $_POST['age'] ?? null;
  $sex = $_POST['sex'] ?? null;
  $customer_type = $_POST['customer_type'] ?? null;
  $service_availed = $_POST['service_availed'] ?? null;
  $region = $_POST['region'] ?? null;

  // Citizen Charter
  $citizenCharterAwareness = $_POST['yes_no'] ?? null;
  // Capitalize first letter
  if ($citizenCharterAwareness !== null) {
    $citizenCharterAwareness = ucfirst(strtolower($citizenCharterAwareness));
  }

  if ($citizenCharterAwareness === "no") {
    $cc1 = null;
    $cc2 = null;
    $cc3 = null;
  } else {
    $cc1 = $_POST['cc-1'] ?? null;
    $cc2 = $_POST['cc-2'] ?? null;
    $cc3 = $_POST['cc-3'] ?? null;
  }

  // Satisfaction Questions
  $sqd1 = $_POST['SQD1'] ?? null;
  $sqd2 = $_POST['SQD2'] ?? null;
  $sqd3 = $_POST['SQD3'] ?? null;
  $sqd4 = $_POST['SQD4'] ?? null;
  $sqd5 = $_POST['SQD5'] ?? null;
  $sqd6 = $_POST['SQD6'] ?? null;
  $sqd7 = $_POST['SQD7'] ?? null;
  $sqd8 = $_POST['SQD8'] ?? null;
  $remarks = $_POST['remarks'] ?? null;

  // Insert into feedback_respondents
  $stmt1 = $conn->prepare("INSERT INTO feedback_respondents (name, date, age, sex, customer_type, service_availed, region) VALUES (?, ?, ?, ?, ?, ?, ?)");
  $stmt1->bind_param("sssssss", $name, $date, $age, $sex, $customer_type, $service_availed, $region);

  if ($stmt1->execute()) {
    $respondent_id = $stmt1->insert_id;
    $stmt1->close();

    // Insert into feedback_answers
    $stmt2 = $conn->prepare("INSERT INTO feedback_answers (
      respondent_id, citizen_charter_awareness, cc1, cc2, cc3,
      sqd1, sqd2, sqd3, sqd4, sqd5, sqd6, sqd7, sqd8, remarks
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt2->bind_param(
      "isssssssssssss",
      $respondent_id,
      $citizenCharterAwareness,
      $cc1,
      $cc2,
      $cc3,
      $sqd1,
      $sqd2,
      $sqd3,
      $sqd4,
      $sqd5,
      $sqd6,
      $sqd7,
      $sqd8,
      $remarks
    );

    if ($stmt2->execute()) {
      header("Location: thank-you.php");
      exit;
    } else {
      die("Error inserting feedback: " . $stmt2->error);
    }

    $stmt2->close();
  } else {
    die("Error inserting respondent: " . $stmt1->error);
  }
}

$conn->close();
