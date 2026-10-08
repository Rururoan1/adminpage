<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $page_title ?> | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<!-- Sidebar -->
<div id="sidebar">
  <h5>Admin Panel</h5>
  <a href="/admin/dashboard.php" class="<?= $active == 'dashboard' ? 'active' : '' ?>">Dashboard</a>
  <a href="/admin/library/index.php?type=pest" class="<?= $active == 'pests' ? 'active' : '' ?>">Pests</a>
  <a href="/admin/library/index.php?type=disease" class="<?= $active == 'diseases' ? 'active' : '' ?>">Diseases</a>
  <a href="/admin/users/index.php" class="<?= $active == 'users' ? 'active' : '' ?>">Users</a>
  <a href="/admin/logout.php">Logout</a>
</div>

<!-- Page content starts here (closed in footer.php) -->
<div id="content">
  <h3 class="mb-4"><?= $page_title ?></h3>
