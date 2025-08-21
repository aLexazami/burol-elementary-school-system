<section class=" max-w-7xl m-auto flex justify-between px-10 items-center">
  <div class="flex items-center py-2 ">
    <img src="/assets/img/bes-logo1.png" alt="Burol Elementary School Logo" class="h-12 ">
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
      <button id="menu-btn" class=" flex flex-row items-center space-x-3 max-md:cursor-pointer mr-2">
        <img src="/assets/img/user.png" alt="Profile" class="h-10 w-10 rounded-full border-2 border-emerald-400">
        <div class=" text-emerald-800">
          <p class="font-medium"> <?php echo htmlspecialchars($_SESSION['firstName'] . ' ' . $_SESSION['lastName']); ?></p>
          <p class="uppercase"><?php echo htmlspecialchars($_SESSION['role']); ?></p>
          </p>
        </div>
      </button>
      <a>

      </a>
      <div id="menu-links" class="hidden md:hidden absolute top-17 max-md:top-20   p-3 bg-white shadow-lg rounded-sm ">
        <a href="/pages/main-staff.php" class="menu-link flex items-center  p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600 ">
          <img src="/assets/img/profile.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">My Account
        </a>
        <a href="/pages/main-staff.php" class="menu-link flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600 ">
          <img src="/assets/img/message.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">Message
        </a>
        <a href="/pages/main-staff.php" class="menu-link flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600 ">
          <img src="/assets/img/notif.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">Notification
        </a>
        <a href="/controllers/log-out.php" class="menu-link flex items-center  p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
          <img src="/assets/img/logout.png" alt="Profile" class="h-5 w-5 rounded-full mr-3">Logout
        </a>
      </div>
    </div>

    <!-- Nav Menu for Desktop -->
    <div class="max-md:hidden flex space-x-2">
      <div class=" flex items-center">
        <a href="" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
          <img src="/assets/img/profile.png" alt="Profile" class="h-5 w-5 rounded-full">
          <span class="absolute top-10 w-23 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
            My Account
          </span>
        </a>
      </div>
      <div class=" flex items-center">
        <a href="" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
          <img src="/assets/img/message.png" alt="Profile" class="h-5 w-5 rounded-full">
          <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
            Message
          </span>
        </a>
      </div>
      <div class=" flex items-center">
        <a href="" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
          <img src="/assets/img/notif.png" alt="Profile" class="h-5 w-5 rounded-full">
          <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
            Notification
          </span>
        </a>
      </div>
      <div class=" flex items-center">
        <a href="/controllers/log-out.php" class="group relative flex items-center p-2 text-sm rounded-sm text-emerald-800 hover:bg-emerald-600">
          <img src="/assets/img/logout.png" alt="Profile" class="h-5 w-5 rounded-full">
          <span class="absolute top-10 opacity-0 translate-y-1 transition-all duration-300 text-sm bg-white text-emerald-800 px-2 py-1 rounded group-hover:opacity-100 group-hover:translate-y-0">
            Logout
          </span>
        </a>
      </div>
    </div>
  </div>
</section>