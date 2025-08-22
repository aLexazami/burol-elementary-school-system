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
      <div class="p-2 grid grid-cols-3 gap-4 mt-6">
        <table class="table-auto w-full border-collapse border border-gray-300">
          <thead>
            <tr class="bg-emerald-700 text-white">
              <th>Name</th>
              <th>Date</th>
              <th>Age</th>
              <th>Sex</th>
              <th>Customer Type</th>
              <th>Service Availed</th>
              <th>Region</th>
              <th>Awareness</th>
              <th>CC1</th>
              <th>CC2</th>
              <th>CC3</th>
              <th>Remarks</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $row): ?>
              <tr class="border-t">
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= $row['date'] ?></td>
                <td><?= $row['age'] ?></td>
                <td><?= $row['sex'] ?></td>
                <td><?= $row['customer_type'] ?></td>
                <td><?= $row['service_availed'] ?></td>
                <td><?= $row['region'] ?></td>
                <td><?= $row['citizen_charter_awareness'] ?></td>
                <td><?= $row['cc1'] ?></td>
                <td><?= $row['cc2'] ?></td>
                <td><?= $row['cc3'] ?></td>
                <td><?= nl2br(htmlspecialchars($row['remarks'])) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <!--Footer Section-->
  <?php include '../../includes/footer.php' ?>

  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
</body>

</html>