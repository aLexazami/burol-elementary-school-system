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
        <h1>This is Right Context for Feedback Summary</h1>
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
</body>

</html>