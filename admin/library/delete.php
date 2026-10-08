<?php
// Delete one item
require_once __DIR__ . '/../../includes/auth.php';

// Allow only a real form post
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
    exit('Invalid request.');
}

$type = ($_POST['type'] ?? '') == 'disease' ? 'disease' : 'pest';

$db->prepare('DELETE FROM library_items WHERE id = ?')->execute([$_POST['id'] ?? 0]);

// Raise the library version so the app downloads the update
$db->exec('UPDATE library_meta SET version = version + 1 WHERE id = 1');

header('Location: index.php?type=' . $type . '&deleted=1');
exit;
