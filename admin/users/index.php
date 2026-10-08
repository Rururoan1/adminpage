<?php
// Only logged-in admins can open this page
require_once __DIR__ . '/../../includes/auth.php';
$page_title = 'Users';
$active = 'users';
include __DIR__ . '/../../includes/header.php';
?>

<!-- User list -->
<div class="card" id="user-list">
  <table class="table mb-0" id="user-table">
    <thead>
      <tr><th>Name</th><th>Device</th><th>Scans</th><th>Last Active</th><th></th></tr>
    </thead>
    <tbody>
      <?php
      $users = $db->query('SELECT u.*, (SELECT COUNT(*) FROM scans s WHERE s.user_id = u.id) AS scan_count
                           FROM users u ORDER BY u.last_active DESC');
      foreach ($users as $user) { ?>
        <tr>
          <td><?= htmlspecialchars($user['name'] ?? 'Unknown') ?></td>
          <td><?= htmlspecialchars($user['device_id']) ?></td>
          <td><?= $user['scan_count'] ?></td>
          <td><?= $user['last_active'] ?></td>
          <td class="text-end">
            <a href="view.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-success">View</a>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
