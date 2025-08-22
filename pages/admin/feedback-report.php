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


include(__DIR__ . '/../../controllers/archive.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
  <title>Burol Elementary School</title>
</head>

<body class="bg-gradient-to-b from-white to-emerald-800 h-screen">

  <!-- Header Section -->
    <?php include('../../includes/header.php'); ?>


  <!-- Main Content Section -->
  <main>
    <section class="flex mt-2">
      <!-- Left Side Navigation Section -->
          <?php include '../../includes/side-nav-admin.php'?>

      <!-- Right Side Context Section -->
      <div class="bg-white p-2 h-150">
        <select id="archive-year" onchange="loadArchive(this.value)">
  <option value="2025">2025</option>
  <option value="2024">2024</option>
  <option value="2023">2023</option>
</select>
<div id="archive-results" class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
  <!-- Dynamically insert respondent cards here -->
</div>

      </div>
    </section>
  </main>

  <!--Footer Section-->
  <footer class="bg-emerald-950 absolute bottom-0 w-full">
    <section class="text-center py-3">
      <p class="text-white text-sm">
        Copyrights &copy; 2025. Burol Elementary School. All rights reserved.
      </p>
    </section>
  </footer>


  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
  <script>function loadArchive(year) {
  fetch(`archive.php?year=${year}`)
    .then(res => res.text())
    .then(html => {
      document.getElementById('archive-results').innerHTML = html;
    });
}</script>
</body>

</html>