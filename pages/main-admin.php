<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit();
}

require_once '../db-connection.php';
require_once '../includes/functions.php';


$newCount = getRespondentCount('new', $conn);
$weeklyCount = getRespondentCount('weekly', $conn);
$annualCount = getRespondentCount('annual', $conn);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../src/styles.css" rel="stylesheet">
  <title>Burol Elementary School</title>
</head>

<body class="bg-gradient-to-b from-white to-emerald-800 min-h-screen flex flex-col">

  <!-- Header Section -->
    <?php include '../includes/header.php' ?>

  <!-- Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr] gap-4 mt-2 m-2">
  <!-- Left Side Navigation -->
    <?php include '../includes/side-nav-admin.php' ?>


  <!-- Right Side Content -->
  <section class="bg-white p-2">
    <div class="bg-green-700 p-2 grid grid-cols-3 gap-4 mt-6">
      <div class="bg-blue-200 col-span-3">
        <h1 class="font-bold text-center text-lg">Respondent</h1>
      </div>

      <!-- New -->
      <div class="bg-white shadow-md rounded-lg p-4 text-center">
        <img src="/assets/icons/new.png" class="mx-auto h-6 w-6 mb-2">
        <p class="text-sm text-gray-500 uppercase">New</p>
        <p class="text-2xl font-bold "><?= $newCount ?></p>
      </div>

      <!-- Weekly -->
      <div class="bg-white shadow-md rounded-lg p-4 text-center">
        <img src="/assets/icons/weekly.png" class="mx-auto h-6 w-6 mb-2">
        <p class="text-sm text-gray-500 uppercase">Weekly</p>
        <p class="text-2xl font-bold"><?= $weeklyCount ?></p>
      </div>

      <!-- Total -->
      <div class="bg-white shadow-md rounded-lg p-4 text-center">
        <img src="/assets/icons/total.png" class="mx-auto h-6 w-6 mb-2">
        <p class="text-sm text-gray-500 uppercase">Total</p>
        <p class="text-2xl font-bold "><?= $annualCount ?></p>
      </div>
    </div>
  </section>
</main>

  <!--Footer Section-->
  <?php include '../includes/footer.php' ?>


  <script src="../assets/js/button.js"></script>
  <script src="../assets/js/date-time.js"></script>
</body>

</html>