<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../../db-connection.php';
require_once '../../controllers/auth-check.php';
require_once '../../includes/fetch-feedback-data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <!-- jQuery (required by DataTables) -->
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <!-- DataTables JS -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <!-- FixedHeader extension -->
<link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.4.0/css/fixedHeader.dataTables.min.css">
<script src="https://cdn.datatables.net/fixedheader/3.4.0/js/dataTables.fixedHeader.min.js"></script>
  <title>Feedback Respondents Details</title>
</head>

<body class=" bg-gray-200 min-h-screen flex flex-col">


  <!-- Feedback Respondents Main Content Section -->
  <main >
    <!-- Right Side Context Section -->
    <section class=" mb-10">
      <div class="bg-emerald-300 p-2 ">
        <h1 class="font-bold text-center text-lg">Submitted Feedback</h1>
      </div>
      <a href="/pages/admin/feedback-respondents.php">
        <button class="cursor-pointer  w-fit m-1 hover:bg-emerald-600 rounded-md p-1 absolute">
          <img src="/assets/img/minimize.png" class="w-8 h-8">
        </button>
      </a>
      <br>
      <div class="overflow-auto  m-2">
        <table id="feedbackTable" class="bg-white w-full table-auto text-sm mt-10 mb-20 border-separate border-spacing-y-2">
          <thead class=" bg-gray-300 text-left  text-black">
            <tr class=" shadow-lg sticky top-0 z-10">
              <th class="px-5 py-5 ">No.</th>
              <th class="px-5 ">Name</th>
              <th class="px-5">Date</th>
              <th class="px-5">Age</th>
              <th class="px-5">Sex</th>
              <th class="px-5">Customer Type</th>
              <th class="px-5">Service Availed</th>
              <th class="px-5">Region</th>
              <th class="px-5">Citizen Charter Awareness</th>
              <th class="px-5">CC1</th>
              <th class="px-5">CC2</th>
              <th class="px-5">CC3</th>
              <th class="px-5">SQD1</th>
              <th class="px-5">SQD2</th>
              <th class="px-5">SQD3</th>
              <th class="px-5">SQD4</th>
              <th class="px-5">SQD5</th>
              <th class="px-5">SQD6</th>
              <th class="px-5">SQD7</th>
              <th class="px-5">SQD8</th>
              <th class="px-5">Remarks</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($results as $row): ?>
              <tr class="shadow-lg border-t ">
                <td class="px-5 py-5 font-medium  "><?= $row['id'] ?></td>
                <td class="px-5 py-5"><?= htmlspecialchars($row['name']) ?></td>
                <td class="px-5 py-5"><?= $row['date'] ?></td>
                <td class="px-5 py-5"><?= $row['age'] ?></td>
                <td class="px-5 py-5"><?= $row['sex'] ?></td>
                <td class="pl-5 pr-11 py-5"><?= $row['customer_type'] ?></td>
                <td class="px-5 py-5"><?= $row['service_availed'] ?></td>
                <td class="px-5 py-5"><?= $row['region'] ?></td>
                <td class="px-5 py-5"><?= $row['citizen_charter_awareness'] ?></td>
                <td class="px-5 py-5"><?= $row['cc1'] ?></td>
                <td class="px-5 py-5"><?= $row['cc2'] ?></td>
                <td class="px-5 py-5"><?= $row['cc3'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd1'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd2'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd3'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd4'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd5'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd6'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd7'] ?></td>
                <td class="px-5 py-5"><?= $row['sqd8'] ?></td>
                <td class="px-5 py-5"><?= $row['remarks'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>

  <!--Footer Section-->
  <?php include '../../includes/footer.php' ?>
  <script>
  $(document).ready(function () {
    $('#feedbackTable').DataTable({
      scrollX: true,
      pageLength: 10,
      lengthChange: false,
      order: [[0, 'desc']],
      fixedHeader: true,
        dom: '<"top"f>rt<"bottom"ip><"clear">'

    });
  });
</script>

</body>

</html>