<?php

include "../config/db.php";

if(!isset($_SESSION['user_id'])){

header("Location: ../auth/login.php");

}

$id=$_SESSION['user_id'];

$result=$conn->query("SELECT * FROM users WHERE id=$id");

$user=$result->fetch_assoc();

include "../templates/header.php";

?>

<h2>My Profile</h2>

<p>Name: <?php echo $user['fullname']; ?></p>

<p>Email: <?php echo $user['email']; ?></p>

<?php include "../templates/footer.php"; ?>