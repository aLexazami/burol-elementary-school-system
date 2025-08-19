<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="../src/styles.css" rel="stylesheet">
  <title>Burol Elementary School</title>
</head>

<body class="bg-gradient-to-b from-white to-emerald-800 h-screen">

  <!-- Header Section -->
  <header class=" shadow-md sticky-top-0 z-10 bg-white">
    <section class=" max-w-7xl m-auto flex justify-between px-10 items-center">
      <div class="flex items-center py-2 ">
        <img src="../assets/img/bes-logo1.png" alt="Burol Elementary School Logo" class="h-12 ">
        <p class="text-xl font-medium text-emerald-800 ml-5">
          Burol Elementary School
        </p>
      </div>

      <!-- Date and Time Section -->
      <div class="flex text-sm text-emerald-800 font-bold ">
        <span id="date-time"></span>
      </div>
      <div class="flex justify-end items-center">


        <!-- Nav Menu for Mobile -->
        <!-- Navigation Buttons -->
        <div class=" flex flex-row">
          <button id="menu-btn" class=" flex flex-row items-center space-x-3 cursor-pointer mr-2">
            <img src="../assets/img/user.png" alt="Profile" class="h-10 w-10 rounded-full">
            <div class=" text-emerald-800">
              <p class="font-medium">Admin Bot</p>
              <p>STAFF</p>
            </div>
          </button>
          <a>

          </a>
          <div id="menu-links" class="md:hidden absolute top-17 max-md:top-20   px-3 bg-white shadow-lg rounded-sm h-40">
            <a href="/pages/main-staff.php" class="menu-link flex items-center opacity-0 translate-y-2 transition-all duration-300 ease-out p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600 ">
              <img src="../assets/img/profile.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">My Account
            </a>
            <a href="/pages/main-staff.php" class="menu-link flex items-center opacity-0 translate-y-2 transition-all duration-300 ease-out p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600 ">
              <img src="../assets/img/message.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">Message
            </a>
            <a href="/pages/main-staff.php" class="menu-link flex items-center opacity-0 translate-y-2 transition-all duration-300 ease-out p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600 ">
              <img src="../assets/img/notif.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">Notification
            </a>
            <a href="/controllers/log-out.php" class="menu-link flex items-center opacity-0 translate-y-2 transition-all duration-300 ease-out p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
              <img src="../assets/img/logout.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">Logout
            </a>
          </div>
        </div>

        <!-- Nav Menu for Desktop -->
        <div class="max-md:hidden flex space-x-2">
          <div class=" flex items-center">
            <a href="" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
              <img src="../assets/img/profile.png" alt="Profile" class="h-5 w-5 rounded-full">
              <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
                My Account
              </span>
            </a>
          </div>
          <div class=" flex items-center">
            <a href="" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
              <img src="../assets/img/message.png" alt="Profile" class="h-5 w-5 rounded-full">
              <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
                Message
              </span>
            </a>
          </div>
          <div class=" flex items-center">
            <a href="" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
              <img src="../assets/img/notif.png" alt="Profile" class="h-5 w-5 rounded-full">
              <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
                Notification
              </span>
            </a>
          </div>
          <div class=" flex items-center">
            <a href="/controllers/log-out.php" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
              <img src="../assets/img/logout.png" alt="Profile" class="h-5 w-5 rounded-full">
              <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
                Logout
              </span>
            </a>
          </div>
        </div>
      </div>


    </section>
  </header>

  <!-- Main Content Section -->
  <!-- Main Staff Section-->
  <main class="max-w-4xl mx-auto px-4 pt-10 ">


  </main>

  <!--Footer Section-->
  <footer class="bg-emerald-950 absolute bottom-0 w-full">
    <section class="text-center py-3">
      <p class="text-white text-sm">
        Copyrights &copy; 2025. Burol Elementary School. All rights reserved.
      </p>
    </section>
  </footer>


  <script src="../assets/js/button.js"></script>
  <script src="../assets/js/date-time.js"></script>
</body>

</html>