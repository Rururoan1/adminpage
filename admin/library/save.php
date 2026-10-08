<?php
// Save a new item or update an existing one
require_once __DIR__ . '/../../includes/auth.php';

// Allow only a real form post
if ($_SERVER['REQUEST_METHOD'] != 'POST' || !hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
    exit('Invalid request.');
}

$id = $_POST['id'] ?? '';
$type = ($_POST['type'] ?? '') == 'disease' ? 'disease' : 'pest';
$slug = trim($_POST['slug'] ?? '');
$name = trim($_POST['name'] ?? '');
$local_name = trim($_POST['local_name'] ?? '');
$scientific_name = trim($_POST['scientific_name'] ?? '');
$description = trim($_POST['description'] ?? '');
$cause = trim($_POST['cause'] ?? '');
$symptoms = trim($_POST['symptoms'] ?? '');
$prevention = trim($_POST['prevention'] ?? '');

if ($name == '') {
    exit('Name is required. Go back and fill it in.');
}

if ($id) {
    // Edit: update the saved item
    $db->prepare('UPDATE library_items SET name=?, local_name=?, scientific_name=?, description=?, cause=?, symptoms=?, prevention=? WHERE id=?')
       ->execute([$name, $local_name, $scientific_name, $description, $cause, $symptoms, $prevention, $id]);
} else {
    // Add: slug must be valid and not used yet
    if (!preg_match('/^[a-z0-9_]+$/', $slug)) {
        exit('Slug can only use lowercase letters, numbers and underscore.');
    }
    $check = $db->prepare('SELECT COUNT(*) FROM library_items WHERE slug = ?');
    $check->execute([$slug]);
    if ($check->fetchColumn() > 0) {
        exit('That slug is already used. Go back and change it.');
    }
    $db->prepare('INSERT INTO library_items (slug, type, name, local_name, scientific_name, description, cause, symptoms, prevention) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)')
       ->execute([$slug, $type, $name, $local_name, $scientific_name, $description, $cause, $symptoms, $prevention]);
}

// Raise the library version so the app downloads the update
$db->exec('UPDATE library_meta SET version = version + 1 WHERE id = 1');

header('Location: index.php?type=' . $type . '&saved=1');
exit;
