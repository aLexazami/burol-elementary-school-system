<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../../controllers/auth-check.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
  <title>Feedback Report</title>
</head>

<body class="bg-gray-200  min-h-screen flex flex-col">

  <!-- Header Section -->
    <?php include('../../includes/header.php'); ?>


  <!-- Feedback Respondents Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr] h-screen">
      <!-- Left Side Navigation Section -->
          <?php include '../../includes/side-nav-admin.php'?>

      <!-- Right Side Context Section -->
      <section class="m-4">
        <div class="p-2 grid grid-cols-3 gap-4 mt-6">
          <h1>This is Right Context for Feedback Report</h1>
        </div>
      </section>
  </main>

  <!--Footer Section-->
 <?php include '../../includes/footer.php' ?>

  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
</body>

</html>