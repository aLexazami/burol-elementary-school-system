<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<div class="flex flex-col items-center mt-10 mb-20">
  <img src="/assets/img/user.png" class="h-15 w-15 rounded-full border-2 border-emerald-400">
  <h1 class="text-md text-emerald-800 font-medium pt-3">
    <?php echo htmlspecialchars($_SESSION['firstName'] . ' ' . $_SESSION['lastName']); ?>
  </h1>
</div>
<?php
$navItems = [
  ['label' => 'Dashboard', 'href' => '/pages/main-admin.php', 'icon' => 'home.png'],
  ['label' => 'Feedback Respondents', 'href' => '/pages/admin/feedback-respondents.php', 'icon' => 'feedback-respondent.png'],
  ['label' => 'Feedback Summary', 'href' => '/pages/admin/feedback-summary.php', 'icon' => 'feedback-summary.png'],
  ['label' => 'Feedback Report', 'href' => '/pages/admin/feedback-report.php', 'icon' => 'feedback-report.png'],
];
?>
<?php foreach ($navItems as $item): ?>
  <?php $isActive = $currentPage === basename($item['href']); ?>
  <a href="<?= $item['href'] ?>" class="group relative flex items-center hover:text-emerald-400 mx-2 pt-2 pr-1 pb-1 rounded-md w-fit">
    <img src="/assets/img/<?= $item['icon'] ?>" class="w-4 h-4">
    <span class="ml-2 font-medium text-sm <?= $isActive ? 'text-emerald-400' : 'text-emerald-800' ?>">
      <?= $item['label'] ?>
    </span>
    <span class="absolute bottom-0 left-0 w-full h-[2px] bg-emerald-400 transition-transform origin-center
      <?= $isActive ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' ?>">
    </span>
  </a>
<?php endforeach; ?>

