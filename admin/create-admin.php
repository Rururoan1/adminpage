<?php
// Run this ONCE to make the first admin, then delete this file
require_once __DIR__ . '/../includes/db.php';

if ($db->query('SELECT COUNT(*) FROM admins')->fetchColumn() > 0) {
    exit('Admin already exists. Delete this file.');
}

$db->prepare('INSERT INTO admins (username, password_hash) VALUES (?, ?)')
   ->execute(['admin', password_hash('change-me-123', PASSWORD_DEFAULT)]);

echo 'Admin created (admin / change-me-123). Delete this file now.';
