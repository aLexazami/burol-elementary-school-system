<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once __DIR__.'/../auth/session.php';
require_once __DIR__ . '/../config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../src/styles.css" rel="stylesheet">
  <title>Super Admin Dashboard</title>
</head>

<body class="bg-gradient-to-b from-white to-emerald-800 h-screen">


  <!-- Header Section -->
  <header class=" shadow-md sticky-top-0 z-10 bg-white">
    <?php include '../includes/header.php' ?>
  </header>

  <!-- Main Content Section -->
  <!-- Main Staff Section-->
  <main class="max-w-4xl mx-auto px-4 pt-10 ">


  </main>

  <!--Footer Section-->
 <?php include '../includes/footer.php'?>


  <script src="../assets/js/button.js"></script>
  <script src="../assets/js/date-time.js"></script>
</body>

</html>