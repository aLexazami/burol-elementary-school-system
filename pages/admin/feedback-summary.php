<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once '../../controllers/auth-check.php';
require_once '../../db-connection.php';
require_once '../../includes/functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="/src/styles.css" rel="stylesheet">
  <title>Feedback Summary</title>
</head>

<body class="bg-gray-200  min-h-screen flex flex-col">

  <!-- Header Section -->
  <?php include('../../includes/header.php'); ?>


  <!-- Feedback Summary Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr]  m-h-screen">
    <!-- Left Side Navigation Section -->
    <?php include '../../includes/side-nav-admin.php' ?>

    <!-- Right Side Context Section -->
    <section class="m-4">
      <div class="bg-emerald-300 p-2 flex justify-center items-center gap-2">
        <img src="/assets/img/feedback-summary.png " class="w-5 h-5">
        <h1 class="font-bold text-lg ">Feedback Summary</h1>
      </div>
      <div class="pt-2 grid grid-cols-4 gap-2">
        <div class="p-4 shadow-lg col-span-2 bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Customer Type</h1>
          <div class="mt-10 divide-y divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Business:</span>
              <span id="count-business" class="text-red-400 font-bold text-right"><?= $counts['Business'] ?? 0 ?></span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Citizen:</span>
              <span id="count-citizen" class="text-red-400 font-bold text-right"><?= $counts['Citizen'] ?? 0 ?></span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Government:</span>
              <span id="count-government" class="text-red-400 font-bold text-right"><?= $counts['Government'] ?? 0 ?>
</span>
            </div>
          </div>
        </div>
        <div class="p-4 shadow-lg col-span-2 bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Customer Age</h1>
          <div class="mt-10 divide-y divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">19 - Under:</span>
              <span id="age-under-19" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">20 - 34:</span>
              <span id="age-20-34" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">35 - 49:</span>
              <span id="age-35-49" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">50 - 64:</span>
              <span id="age-50-64" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">65 - Higher:</span>
              <span id="age-65-up" class="text-red-400 font-bold text-right">0</span>
            </div>
          </div>
        </div>
        <div class="p-4 shadow-lg col-span-2 bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Citizen Charter Awareness</h1>
          <div class="mt-10 divide-y divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Yes:</span>
              <span id="awareness-yes" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">No:</span>
              <span id="awareness-no" class="text-red-400 font-bold text-right">0</span>
            </div>
          </div>
        </div>
        <div class="p-4 shadow-lg col-span-2 bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Citizen Charter Awareness Response</h1>
          <div class="mt-10 divide-y divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">CC1:</span>
              <span id="cc1-response" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">CC2:</span>
              <span id="cc2-response" class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">CC3:</span>
              <span id="cc3-response" class="text-red-400 font-bold text-right">0</span>
            </div>
          </div>
        </div>
        <div class=" p-4 shadow-lg col-span-4 bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Client Satisfactory Response</h1>
          <div class="mt-10 divide-y divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD1:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD2:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD3:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD4:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD5:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD6:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD7:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">SQD8:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
          </div>
        </div>
        <div class="col-span-4 p-4 shadow-lg bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Service Availed</h1>
          <div class="mt-10 divide-y divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Acceptance of Employment Application for Teacher I Position (Walk-in):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Acceptance of Employment Application for Teacher I Position (Online) CC3:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Borrowing of Learning Materials from the School Library/Learning Resource Center:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Distribution of Printed Self Learning Modules in Distance Learning Modality:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Enrollment (Walk-in):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Enrollment (Online):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Issuance of Requested Documents in Certified True Copy (CTC) and Photocopy (Walk-in):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Issuance of Requested Documents in Certified True Copy (CTC) and Photocopy (Online):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Issuance of School Clearance for different purposes:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Issuance of School Forms, Certifications, and other School Permanent Records:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Public Assistance (walk-in/phone call):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Public Assistance (email/social media):</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Laboratory and School Inventory:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">School Learning and Development:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Receiving and releasing of communications and other documents:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Request for Personnel Records for Teaching/Non-Teaching Personnel:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Reservation Process for the Use of School Facilities:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Issuance of Special Order for Service Credits and Certification of Compensatory Time Credits:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
          </div>
        </div>
        <div class="col-span-4 p-4 shadow-lg bg-white rounded-lg">
          <h1 class="text-lg text-center text-emerald-800 font-bold">Region</h1>
          <div class="mt-10 divide-y  divide-gray-200">
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region I - Ilocos Region:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region II - Cagayan Valley:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region III - Central Luzon:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region IV-A - Calabarzon:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">MIMAROPA - Southwestern Tagalog:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region V - Bicol Region:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region VI - Western Visayas:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2">
              <span class="font-medium">Region VII - Central Visayas:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region VIII - Eastern Visayas:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region IX - Zamboanga Peninsula:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region X - Northern Mindanao:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region XI - Davao Region:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region XII - SOCCSKSARGEN:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">Region XIII - Caraga:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">NCR - National Capital Region:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">CAR - Cordillera Administrative Region:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
            <div class="grid grid-cols-2 py-2 hover:bg-gray-100">
              <span class="font-medium">BARMM - Bangsamoro Autonomous Region:</span>
              <span class="text-red-400 font-bold text-right">0</span>
            </div>
          </div>
        </div>
    </section>
  </main>

  <!--Footer Section-->
  <?php include '../../includes/footer.php' ?>

  <script src="/assets/js/update-sumarry.js"></script>
  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
</body>

</html>