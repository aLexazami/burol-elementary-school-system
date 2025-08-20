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
$totalCount = getRespondentCount('total', $conn);


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
  <header class=" shadow-md sticky-top-0 z-10 bg-white">
    <?php include '../includes/header.php' ?>
  </header>

  <!-- Main Content Section -->
  <main class="">
    <section class="flex mt-2">
      <!-- Left Side Navigation Section -->
      <div class=" bg-white p-2 mr-3 space-y-2 ">
          <?php include '../includes/side-nav-admin.php'?>
      </div>
      <!-- Right Side Context Section -->
      <div class="bg-white p-2 h-150">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mt-6">
  <!-- New -->
  <div class="bg-white shadow-md rounded-lg p-4 text-center">
    <img src="/assets/icons/new.png" class="mx-auto h-6 w-6 mb-2">
    <p class="text-sm text-gray-500 uppercase">New</p>
    <p class="text-2xl font-bold text-emerald-800"><?= $newCount ?></p>
  </div>

  <!-- Weekly -->
  <div class="bg-white shadow-md rounded-lg p-4 text-center">
    <img src="/assets/icons/weekly.png" class="mx-auto h-6 w-6 mb-2">
    <p class="text-sm text-gray-500 uppercase">Weekly</p>
    <p class="text-2xl font-bold text-emerald-800"><?= $weeklyCount ?></p>
  </div>

  <!-- Total -->
  <div class="bg-white shadow-md rounded-lg p-4 text-center">
    <img src="/assets/icons/total.png" class="mx-auto h-6 w-6 mb-2">
    <p class="text-sm text-gray-500 uppercase">Total</p>
    <p class="text-2xl font-bold text-emerald-800"><?= $totalCount ?></p>
  </div>
</div>
      </div>
      </div>
    </section>
  </main>

  <!--Footer Section-->
 <?php include '../includes/footer.php'?>


  <script src="../assets/js/button.js"></script>
  <script src="../assets/js/date-time.js"></script>
</body>

</html>