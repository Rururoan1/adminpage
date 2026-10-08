<?php
// Only logged-in admins. Show the pest list or the disease list.
require_once __DIR__ . '/../../includes/auth.php';
$type = ($_GET['type'] ?? '') == 'disease' ? 'disease' : 'pest';
$page_title = $type == 'pest' ? 'Pests' : 'Diseases';
$active = $type == 'pest' ? 'pests' : 'diseases';
include __DIR__ . '/../../includes/header.php';
?>

<!-- Add button -->
<a href="form.php?type=<?= $type ?>" id="add-button" class="btn btn-primary mb-3">+ Add New</a>

<!-- Message after saving or deleting -->
<?php if (isset($_GET['saved'])) { ?>
  <div class="alert alert-success" id="message">Saved. The app will get this update.</div>
<?php } ?>
<?php if (isset($_GET['deleted'])) { ?>
  <div class="alert alert-success" id="message">Deleted.</div>
<?php } ?>

<!-- Library list -->
<div class="card" id="library-list">
  <table class="table mb-0" id="library-table">
    <thead>
      <tr><th>Name</th><th>Local Name</th><th>Scientific Name</th><th>Updated</th><th></th></tr>
    </thead>
    <tbody>
      <?php
      $stmt = $db->prepare('SELECT * FROM library_items WHERE type = ? ORDER BY name');
      $stmt->execute([$type]);
      foreach ($stmt as $item) { ?>
        <tr>
          <td><?= htmlspecialchars($item['name']) ?></td>
          <td><?= htmlspecialchars($item['local_name']) ?></td>
          <td><em><?= htmlspecialchars($item['scientific_name']) ?></em></td>
          <td><?= $item['updated_at'] ?></td>
          <td class="text-end">
            <a href="form.php?id=<?= $item['id'] ?>" class="btn btn-sm btn-outline-success">Edit</a>
            <!-- Delete form (confirm first) -->
            <form method="post" action="delete.php" class="d-inline" onsubmit="return confirm('Delete this item?')">
              <input type="hidden" name="id" value="<?= $item['id'] ?>">
              <input type="hidden" name="type" value="<?= $type ?>">
              <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">
              <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
            </form>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
