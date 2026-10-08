<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>

<!-- Login page -->
<div id="login-page">
  <div id="login-box" class="card p-4">

    <h4 class="text-center mb-3">Admin Login</h4>

    <!-- Error message -->
    <?php if (isset($_GET['error'])) { ?>
      <div class="alert alert-danger" id="login-error">Wrong username or password.</div>
    <?php } ?>

    <!-- Login form -->
    <form id="login-form" method="post" action="login-check.php">
      <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
      <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>
      <button type="submit" id="login-button" class="btn btn-primary w-100">Login</button>
    </form>

  </div>
</div>

</body>
</html>
