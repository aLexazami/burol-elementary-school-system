<div class="flex flex-col items-center mt-10 mb-20">
          <img src="/assets/img/user.png" class="h-15 w-15">
          <h1 class="text-md text-emerald-800 font-medium pt-3">
            <?php echo htmlspecialchars($_SESSION['firstName'] . ' ' . $_SESSION['lastName']); ?>
          </h1>
        </div>
        <a href="/pages/main-admin.php" class="group relative flex items-center hover:text-emerald-400 mx-2 pt-2 pb-1 rounded-md  w-fit">
          <img src="/assets/img/home.png" class="w-4 h-4">
          <span class="ml-2 font-medium text-sm text-emerald-800">Dashboard</span>
          <span class="absolute bottom-0 left-0 w-full h-[2px] bg-emerald-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-center"></span>
        </a>
        <a href="/pages/admin/feedback-respondents.php" class="group relative flex items-center w-fit hover:text-emerald-400  mx-2  pt-2 pb-1 rounded-md ">
          <img src="/assets/img/feedback-respondent.png" class="w-4 h-4">
          <span class="ml-2 font-medium text-sm text-emerald-800">Feedback Respondents</span>
          <span class="absolute bottom-0 left-0 w-full h-[2px] bg-emerald-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-center"></span>
        </a>
        <a href="/pages/admin/feedback-summary.php" class="group relative items-center flex w-fit hover:text-emerald-400 mx-2 pt-2 pb-1 rounded-md ">
          <img src="/assets/img/feedback-summary.png" class="w-4 h-4">
          <span class="ml-2 font-medium text-sm text-emerald-800">Feedback Summary</span>
          <span class="absolute bottom-0 left-0 w-full h-[2px] bg-emerald-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-center"></span>
        </a>
        <a href="/pages/admin/feedback-report.php" class="group relative flex items-center w-fit hover:text-emerald-400 mx-2 pt-2 pb-1 rounded-md ">
          <img src="/assets/img/feedback-report.png" class="w-4 h-4">
          <span class="ml-2 font-medium text-sm text-emerald-800">Feedback Report</span>
          <span class="absolute bottom-0 left-0 w-full h-[2px] bg-emerald-400 scale-x-0 group-hover:scale-x-100 transition-transform origin-center"></span>
        </a>