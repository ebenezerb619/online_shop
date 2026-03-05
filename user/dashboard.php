<?php

include "../config/db.php";

if(!isset($_SESSION['user_id'])){

header("Location: ../auth/login.php");

}

include "../templates/header.php";

?>

<h2>User Dashboard</h2>

<p>Welcome! Choose an option.</p>

<a href="products.php">View Products</a>

<?php include "../templates/footer.php"; ?>