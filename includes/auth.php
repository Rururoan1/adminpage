<?php
// Only logged-in admins can pass. Also makes the security code used by forms.
session_start();
require_once __DIR__ . '/db.php';

if (!isset($_SESSION['admin'])) {
    header('Location: /admin/login.php');
    exit;
}

if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(16));
}
