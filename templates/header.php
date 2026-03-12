<?php include_once "../config/db.php"; ?>

<!DOCTYPE html>
<html>
<head>

<title>Online Shop</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<nav>

<div>

<a href="../user/dashboard.php">Home</a>

</div>

<div>

<a href="../user/products.php">Products</a>

<a href="../user/profile.php">Profile</a>

<a href="../auth/logout.php">Logout</a>

</div>

</nav>

<?php if ($flash = get_flash()): ?>
  <div class="flash-message flash-<?= htmlspecialchars($flash['type'], ENT_QUOTES, 'UTF-8'); ?>">
    <?= htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8'); ?>
  </div>
<?php endif; ?>

<div class="container">