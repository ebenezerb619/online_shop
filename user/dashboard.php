<?php
include "../config/db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../auth/login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
<title>User Dashboard</title>
<link rel="stylesheet" href="../css/style.css">
</head>

<body class="dashboard-body">

<!-- Navigation -->
<div class="dashboard-nav">

<div class="logo"> Opoku's
Electronics Shop
</div>

<div class="nav-links">
<a href="products.php">Products</a>
<a href="profile.php">Profile</a>
<a href="../auth/logout.php">Logout</a>
</div>

</div>

<!-- Dashboard Content -->
<div class="dashboard-container">

<h1>Welcome to your Dashboard</h1>

<div class="dashboard-cards">

<div class="dashboard-card">
<h3>View Products</h3>
<p>Browse all available products</p>
<a class="card-btn" href="products.php">Open</a>
</div>

<div class="dashboard-card">
<h3>My Profile</h3>
<p>Manage your account</p>
<a class="card-btn" href="profile.php">Open</a>
</div>

<div class="dashboard-card">
<h3>Logout</h3>
<p>Sign out of your account</p>
<a class="card-btn" href="../auth/logout.php">Logout</a>
</div>

</div>

</div>

</body>
</html>