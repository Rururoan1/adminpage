<?php
// Only logged-in admins can open this page
require_once __DIR__ . '/../includes/auth.php';
$page_title = 'Dashboard';
$active = 'dashboard';
include __DIR__ . '/../includes/header.php';
?>

<!-- Total counts -->
<div class="row" id="stat-cards">
  <div class="col-md-3 mb-3">
    <div class="card stat-card"><div class="card-body">
      <small>Pests</small>
      <h2><?= $db->query("SELECT COUNT(*) FROM library_items WHERE type = 'pest'")->fetchColumn() ?></h2>
    </div></div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card stat-card"><div class="card-body">
      <small>Diseases</small>
      <h2><?= $db->query("SELECT COUNT(*) FROM library_items WHERE type = 'disease'")->fetchColumn() ?></h2>
    </div></div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card stat-card"><div class="card-body">
      <small>Users</small>
      <h2><?= $db->query('SELECT COUNT(*) FROM users')->fetchColumn() ?></h2>
    </div></div>
  </div>
  <div class="col-md-3 mb-3">
    <div class="card stat-card"><div class="card-body">
      <small>Scans</small>
      <h2><?= $db->query('SELECT COUNT(*) FROM scans')->fetchColumn() ?></h2>
    </div></div>
  </div>
</div>

<!-- Recent scans -->
<div class="card mt-3" id="recent-scans">
  <div class="card-header">Recent Scans</div>
  <table class="table mb-0" id="scan-table">
    <thead>
      <tr><th>Date</th><th>User</th><th>Result</th><th>Confidence</th></tr>
    </thead>
    <tbody>
      <?php
      $scans = $db->query('SELECT s.created_at, u.name, s.result, s.confidence
                           FROM scans s LEFT JOIN users u ON u.id = s.user_id
                           ORDER BY s.id DESC LIMIT 5');
      foreach ($scans as $scan) { ?>
        <tr>
          <td><?= $scan['created_at'] ?></td>
          <td><?= htmlspecialchars($scan['name'] ?? 'Unknown') ?></td>
          <td><?= htmlspecialchars($scan['result']) ?></td>
          <td><?= $scan['confidence'] ?>%</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/../includes/footer.php'; ?>
