<?php
// Only logged-in admins. One form for both Add and Edit.
require_once __DIR__ . '/../../includes/auth.php';
$id = $_GET['id'] ?? '';
$type = ($_GET['type'] ?? '') == 'disease' ? 'disease' : 'pest';
$item = ['slug' => '', 'name' => '', 'local_name' => '', 'scientific_name' => '',
         'description' => '', 'cause' => '', 'symptoms' => '', 'prevention' => ''];

// When editing, load the saved item
if ($id) {
    $stmt = $db->prepare('SELECT * FROM library_items WHERE id = ?');
    $stmt->execute([$id]);
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$item) { header('Location: index.php'); exit; }
    $type = $item['type'];
}

$page_title = ($id ? 'Edit ' : 'Add ') . ($type == 'pest' ? 'Pest' : 'Disease');
$active = $type == 'pest' ? 'pests' : 'diseases';
include __DIR__ . '/../../includes/header.php';
?>

<!-- Library form -->
<div class="card p-4" id="library-form-box">
  <form method="post" action="save.php" id="library-form">
    <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>">
    <input type="hidden" name="type" value="<?= $type ?>">
    <input type="hidden" name="csrf" value="<?= $_SESSION['csrf'] ?>">

    <!-- Short fields -->
    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label">Slug (app ID)</label>
        <input type="text" name="slug" id="slug" class="form-control" required
               value="<?= htmlspecialchars($item['slug']) ?>" <?= $id ? 'readonly' : '' ?>>
        <small class="text-muted">Lowercase, numbers, underscore. Cannot be changed later.</small>
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" required
               value="<?= htmlspecialchars($item['name']) ?>">
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Local Name</label>
        <input type="text" name="local_name" id="local-name" class="form-control"
               value="<?= htmlspecialchars($item['local_name']) ?>">
      </div>
    </div>
    <div class="mb-3">
      <label class="form-label">Scientific Name</label>
      <input type="text" name="scientific_name" id="scientific-name" class="form-control"
             value="<?= htmlspecialchars($item['scientific_name']) ?>">
    </div>

    <!-- Long fields -->
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description" id="description" class="form-control" rows="3"><?= htmlspecialchars($item['description']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Cause</label>
      <textarea name="cause" id="cause" class="form-control" rows="3"><?= htmlspecialchars($item['cause']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Symptoms</label>
      <textarea name="symptoms" id="symptoms" class="form-control" rows="3"><?= htmlspecialchars($item['symptoms']) ?></textarea>
    </div>
    <div class="mb-3">
      <label class="form-label">Prevention</label>
      <textarea name="prevention" id="prevention" class="form-control" rows="3"><?= htmlspecialchars($item['prevention']) ?></textarea>
    </div>

    <!-- Buttons -->
    <button type="submit" id="save-button" class="btn btn-primary">Save</button>
    <a href="index.php?type=<?= $type ?>" id="cancel-button" class="btn btn-outline-secondary">Cancel</a>
  </form>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>
