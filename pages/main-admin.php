<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../controllers/auth-check.php';
require_once '../db-connection.php';
require_once '../controllers/functions.php';
require_once '../controllers/respondent-counts.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../src/styles.css" rel="stylesheet">
  <title>Admin Dashboard</title>
</head>

<body class="bg-gradient-to-b from-white to-emerald-800 min-h-screen">

  <!-- Header Section -->
  <?php include '../includes/header.php' ?>

  <!-- Admin Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr] gap-4 m-2 min-h-screen">
    <!-- Left Side Navigation -->
    <?php include '../includes/side-nav-admin.php' ?>

    <!-- Right Side Content -->
    <section class="bg-gray-200 p-2">
      <div class="p-2 grid grid-cols-3 gap-4 mt-6">
        <div class="bg-emerald-300 col-span-3  p-2">
          <h1 class="font-bold text-center text-lg">Respondents</h1>
        </div>

        <!-- New -->
        <div class="bg-white shadow-md rounded-lg p-4 text-center">
          <img src="/assets/img/new.png" class="mx-auto h-15 w-15 mb-2  ">
          <p class="text-sm text-gray-500 uppercase ">New</p>
          <p id="new-count" class="text-2xl font-bold "><?= $newCount ?></p>
        </div>

        <!-- Weekly -->
        <div class="bg-white shadow-md rounded-lg p-4 text-center">
          <img src="/assets/img/weekly.png" class="mx-auto h-15 w-15 mb-2 ">
          <p class="text-sm text-gray-500 uppercase">Weekly</p>
          <p id="weekly-count"  class="text-2xl font-bold"><?= $weeklyCount ?></p>
        </div>

        <!-- Total -->
        <div class="bg-white shadow-md rounded-lg p-4 text-center">
          <img src="/assets/img/total.png" class="mx-auto h-15 w-15 mb-2 ">
          <p class="text-sm text-gray-500 uppercase">Total</p>
          <p id="annual-count" class="text-2xl font-bold "><?= $annualCount ?></p>
        </div>
      </div>
    </section>
  </main>

  <!--Footer Section-->
  <?php include '../includes/footer.php' ?>

  <script src="../assets/js/update-respondent-counts.js"></script>
  <script src="../assets/js/button.js"></script>
  <script src="../assets/js/date-time.js"></script>
</body>

</html>
