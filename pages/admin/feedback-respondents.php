<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start session
session_start();

require_once '../../db-connection.php';

// Check if user is logged in
if (!isset($_SESSION['username'])) {
  header("Location: ../index.php");
  exit();
}

require_once '../../includes/fetch-feedback-data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
  <title>Feedback Respondents</title>
</head>

<body class="bg-gradient-to-b from-white to-emerald-800  min-h-screen flex flex-col">

  <!-- Header Section -->
  <?php include('../../includes/header.php'); ?>


  <!-- Feedback Respondents Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr] gap-4 m-2">
    <!-- Left Side Navigation Section -->
    <?php include '../../includes/side-nav-admin.php' ?>

    <!-- Right Side Context Section -->
    <section class="bg-white p-2">
      <div class="bg-emerald-300 p-2">
        <h1 class="font-bold text-center text-lg">Submitted Feedback</h1>
      </div>
      <br>
      <table class=" w-full table-auto text-sm mt-10 mb-20 border-separate border-spacing-y-2">
        <thead class=" bg-gray-300 text-left  text-black">
          <tr class=" shadow-lg ">
            <th class="px-5 py-5 ">No.</th>
            <th class="px-5 ">Name</th>
            <th class="px-5">Date</th>
            <th class="px-5">Age</th>
            <th class="px-5">Sex</th>
            <th class="px-5">Customer Type</th>
            <th class="px-5">Service Availed</th>
            <th class="px-5">Region</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $row): ?>
            <tr class="shadow-lg border-t hover:bg-gray-200">
              <td class="px-5 py-5 font-medium "><?= $row['id'] ?></td>
              <td class="px-5 py-5"><?= htmlspecialchars($row['name']) ?></td>
              <td class="px-5 py-5"><?= $row['date'] ?></td>
              <td class="px-5 py-5"><?= $row['age'] ?></td>
              <td class="px-5 py-5"><?= $row['sex'] ?></td>
              <td class="pl-5 pr-11 py-5"><?= $row['customer_type'] ?></td>
              <td class="px-5 py-5"><?= $row['service_availed'] ?></td>
              <td class="px-5 py-5"><?= $row['region'] ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </main>

  <!--Footer Section-->
  <?php include '../../includes/footer.php' ?>

  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
</body>

</html>