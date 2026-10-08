<?php
// Only logged-in admins. Show one user and their scans.
require_once __DIR__ . '/../../includes/auth.php';

$stmt = $db->prepare('SELECT * FROM users WHERE id = ?');
$stmt->execute([$_GET['id'] ?? 0]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) { header('Location: index.php'); exit; }

$page_title = 'User: ' . ($user['name'] ?? 'Unknown');
$active = 'users';
include __DIR__ . '/../../includes/header.php';
?>

<!-- User details -->
<div class="card p-3 mb-3" id="user-details">
  <div><strong>Name:</strong> <?= htmlspecialchars($user['name'] ?? 'Unknown') ?></div>
  <div><strong>Device:</strong> <?= htmlspecialchars($user['device_id']) ?></div>
  <div><strong>Last active:</strong> <?= $user['last_active'] ?></div>
</div>

<!-- Scan history -->
<div class="card" id="user-scans">
  <div class="card-header">Scan History</div>
  <table class="table mb-0" id="scan-table">
    <thead>
      <tr><th>Date</th><th>Result</th><th>Confidence</th></tr>
    </thead>
    <tbody>
      <?php
      $scans = $db->prepare('SELECT * FROM scans WHERE user_id = ? ORDER BY id DESC');
      $scans->execute([$user['id']]);
      foreach ($scans as $scan) { ?>
        <tr>
          <td><?= $scan['created_at'] ?></td>
          <td><?= htmlspecialchars($scan['result']) ?></td>
          <td><?= $scan['confidence'] ?>%</td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<a href="index.php" id="back-button" class="btn btn-outline-secondary mt-3">Back</a>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
