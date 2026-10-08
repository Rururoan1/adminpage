<?php
// Log out and go back to the login page
session_start();
session_destroy();
header('Location: /admin/login.php');
exit;
