<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../../auth/session.php';

if (!isset($_SESSION['user_id']) || $_SESSION['active_role_id'] !== 99) {
  header("Location: ../index.php");
  exit();
}

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../controllers/get-archived-users.php';

// Context for the table
$title = "Archived Users";
$showActions = true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="/src/styles.css" rel="stylesheet" />
  <title><?= $title ?></title>
</head>

<body class="bg-gray-200 min-h-screen flex flex-col">
  <?php include('../../includes/header.php'); ?>

  <main class="grid grid-cols-[248px_1fr] min-h-screen">
    <?php include('../../includes/side-nav-super-admin.php'); ?>

    <section class="m-4">
      <div class="bg-emerald-300 flex justify-center items-center gap-2 p-2 mb-5">
        <img src="/assets/img/archive-user.png " class="w-5 h-5">
        <h1 class="font-bold text-lg ">Archived</h1>
      </div>
      <?php if (isset($_GET['restored']) && $_GET['restored'] === 'success'): ?>
        <div  data-alert="restored" class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded shadow-sm">
          ✅ User restored successfully.
        </div>
      <?php endif; ?>
      <div class="p-6 bg-white rounded-lg shadow-md">
        <?php include(__DIR__ . '/../../components/user-table.php'); ?>
      </div>
    </section>
  </main>

  <?php include('../../includes/footer.php'); ?>

  <script src="/assets/js/auto-dismiss-alert.js"></script>
  <script src="/assets/js/button.js"></script>
  <script src="/assets/js/date-time.js"></script>
  <script>
  const searchInput = document.getElementById('userSearch');
  const clearButton = document.getElementById('clearSearch');
  const rows = document.querySelectorAll('table tbody tr');

  let debounceTimer;

  function filterRows(query) {
    rows.forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  }

  searchInput.addEventListener('input', () => {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
      const query = searchInput.value.toLowerCase();
      filterRows(query);
    }, 300); // 300ms debounce delay
  });

  clearButton.addEventListener('click', () => {
    searchInput.value = '';
    filterRows('');
  });
</script>
</body>

</html>