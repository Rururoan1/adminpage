<?php
// Check the username and password, then go to the dashboard
session_start();
require_once __DIR__ . '/../includes/db.php';

$stmt = $db->prepare('SELECT * FROM admins WHERE username = ?');
$stmt->execute([$_POST['username'] ?? '']);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($admin && password_verify($_POST['password'] ?? '', $admin['password_hash'])) {
    session_regenerate_id(true);
    $_SESSION['admin'] = $admin['username'];
    header('Location: /admin/dashboard.php');
} else {
    header('Location: /admin/login.php?error=1');
}
exit;
