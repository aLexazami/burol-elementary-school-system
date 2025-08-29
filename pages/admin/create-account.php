<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once  __DIR__ . '/../../config/database.php';
require_once  __DIR__ . '/../../auth/session.php';
require_once  __DIR__ . '/../../includes/fetch-feedback-data.php';
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
  <title>Create Account</title>
</head>

<body class="bg-gray-200  min-h-screen flex flex-col">

  <!-- Header Section -->
  <?php include('../../includes/header.php'); ?>


  <!-- Feedback Respondents Main Content Section -->
  <main class=" grid grid-cols-[248px_1fr] min-h-screen">
    <!-- Left Side Navigation Section -->
    <?php include '../../includes/side-nav-admin.php' ?>

    <!-- Right Side Context Section -->
    <section class="m-4">
      <div class="bg-emerald-300 flex justify-center items-center gap-2 p-2 mb-5">
        <img src="/assets/img/create-account.png " class="w-5 h-5">
        <h1 class="font-bold text-lg ">Create Account</h1>
      </div>
      <div class="bg-white shadow-md rounded-lg p-8 w-3/4 m-auto opacity-75 border-2 border-emerald-800">
        <form method="POST" action="/controllers/create-user.php" class="flex flex-col">

          <div class="flex justify-center items-center mb-5 w-90 m-auto  rounded-lg border-2">
            <img src="/assets/img/role.png" class="h-5 m-2">
            <select name="role" class="input h-12 w-80 p-2 border-l-2 font-bold focus:outline-none" required>
              <option value="Staff">Staff</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <div class="flex justify-center items-center mb-5 w-180 m-auto  rounded-lg border-2">
            <img src="/assets/img/name.png" class="h-5 m-2">
            <input type="text" name="first_name" placeholder="First Name" class="input h-12 w-170 p-2 border-l-2  focus:outline-none" required>
          </div>
          <div class="flex justify-center items-center mb-5 w-180 m-auto  rounded-lg border-2">
            <img src="/assets/img/name.png" class="h-5 m-2">
            <input type="text" name="middle_name" placeholder="Middle Name (optional)" class="input h-12 w-170 p-2 border-l-2  focus:outline-none">
          </div>
          <div class="flex justify-center items-center mb-5 w-180 m-auto  rounded-lg border-2">
            <img src="/assets/img/name.png" class="h-5 m-2">
            <input type="text" name="last_name" placeholder="Last Name" class="input h-12 w-170 p-2 border-l-2  focus:outline-none" required>
          </div>
          <div class="flex justify-center items-center mb-5 w-180 m-auto  rounded-lg border-2">
            <img src="/assets/img/username.png" class="h-5 m-2">
            <input type="text" name="username" placeholder="Username" class="input h-12 w-170 p-2 border-l-2  focus:outline-none" required>
          </div>
          <div class="flex justify-center items-center mb-5 w-180 m-auto  rounded-lg border-2">
            <img src="/assets/img/email.png" class="h-5 m-2">
            <input type="email" name="email" placeholder="Email Address" class="input h-12 w-170 p-2 border-l-2  focus:outline-none" required>
          </div>
          <div class="flex justify-center items-center mb-5 w-180 m-auto  rounded-lg border-2">
            <img src="/assets/img/password.png" class="h-5 m-2">
            <input type="password" name="password" placeholder="Password" class="input h-12 w-170 p-2 border-l-2  focus:outline-none" required>
          </div>
          <div class="text-center">
            <button type="submit" class="btn-primary w-55 bg-emerald-800 text-white p-2 rounded hover:bg-emerald-600">
              Create Account
            </button>
          </div>
        </form>
      </div>
    </section>
  </main>

  <!--Footer Section-->
  <?php include '../../includes/footer.php' ?>

  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
</body>

</html>