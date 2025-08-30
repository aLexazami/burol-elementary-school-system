<?php if (!isset($users) || !is_array($users)): ?>
  <p class="text-red-600">⚠️ No user data available.</p>
<?php else: ?>
  <div class="flex items-center gap-2 mb-4">
  <input
    type="text"
    id="userSearch"
    placeholder=" Search"
    class="px-4 py-2 border rounded w-full max-w-md"
  />
  <button
    id="clearSearch"
    class="px-3 py-2 bg-gray-200 hover:bg-gray-300 rounded text-sm"
  >
    Clear
  </button>
</div>
  <table class="min-w-full table-auto border border-gray-200">
    <thead class="bg-emerald-600 text-white">
      <tr>
        <th class="px-4 py-2 text-left">Full Name</th>
        <th class="px-4 py-2 text-left">Username</th>
        <th class="px-4 py-2 text-left">Email</th>
        <th class="px-4 py-2 text-left">Role</th>
        <th class="px-4 py-2 text-left">Password Status</th>
        <?php if ($showActions ?? true): ?>
          <th class="px-4 py-2 text-left">Actions</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr class="border-b hover:bg-emerald-50">
          <td class="px-4 py-2">
            <?= htmlspecialchars($user['last_name'] . ', ' . $user['first_name'] . ' ' . $user['middle_name']) ?>
          </td>
          <td class="px-4 py-2"><?= htmlspecialchars($user['username']) ?></td>
          <td class="px-4 py-2"><?= htmlspecialchars($user['email']) ?></td>
          <td class="px-4 py-2">
            <span class="bg-emerald-100 text-emerald-800 px-2 py-1 rounded text-xs">
              <?= htmlspecialchars($user['role_name']) ?>
            </span>
          </td>
          <td class="px-4 py-2">
            <?= $user['must_change_password']
              ? '<span class="bg-red-100 text-red-700 px-2 py-1 rounded text-xs">Must Change</span>'
              : '<span class="bg-green-100 text-green-700 px-2 py-1 rounded text-xs">OK</span>' ?>
          </td>
          <?php if ($showActions ?? true): ?>
            <td class="px-4 py-2 space-x-2">
              <?php if (isset($user['is_archived']) && $user['is_archived']): ?>
                <a href="/controllers/restore-user.php?id=<?= $user['id'] ?>" class="text-green-600 hover:underline text-sm">Restore</a>
                <button class="text-yellow-400 cursor-not-allowed text-sm" disabled>Archived</button>
              <?php else: ?>
                <a href="edit-user.php?id=<?= $user['id'] ?>" class="text-blue-600 hover:underline text-sm">Edit</a>
                <a href="/controllers/archive-user.php?id=<?= $user['id'] ?>" class="text-yellow-600 hover:underline text-sm">Archive</a>
                <a href="delete-user.php?id=<?= $user['id'] ?>" class="text-red-600 hover:underline text-sm">Delete</a>
              <?php endif; ?>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>