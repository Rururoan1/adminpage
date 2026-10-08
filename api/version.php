<?php
// Tell the app the current library version
require_once __DIR__ . '/../includes/db.php';
header('Content-Type: application/json');

$version = $db->query('SELECT version FROM library_meta WHERE id = 1')->fetchColumn();
echo json_encode(['version' => (int) $version]);
