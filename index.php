<?php include "config/db.php"; ?>

<!DOCTYPE html>
<html>

<head>

<title>Online Shop</title>
<link rel="stylesheet" href="css/style.css">

</head>

<body>

<nav>

<a href="index.php">Home</a>

<?php if(isset($_SESSION['user_id'])){ ?>

<a href="user/dashboard.php">Dashboard</a>
<a href="auth/logout.php">Logout</a>

<?php } else { ?>

<a href="auth/login.php">Login</a>
<a href="auth/register.php">Register</a>

<?php } ?>

</nav>

<div class="container">

<h1>Welcome to our Online Shop</h1>

<p>Create an account and login to view products.</p>

</div>

</body>

</html>