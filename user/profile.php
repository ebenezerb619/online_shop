<?php

include "../config/db.php";

if(!isset($_SESSION['user_id'])){
header("Location: ../auth/login.php");
}

$id=$_SESSION['user_id'];

$result=$conn->query("SELECT * FROM users WHERE id=$id");

$user=$result->fetch_assoc();

include "../templates/header.php";

if(isset($_POST['update'])){

$name=$_POST['fullname'];

$conn->query("UPDATE users SET fullname='$name' WHERE id=$id");

echo "<p>Profile Updated</p>";

}

?>

<h2>My Profile</h2>

<form method="POST">


<input type="text" name="fullname" value="<?php echo $user['fullname']; ?>">

<button name="update">Update Profile</button>

</form>

<p>Email: <?php echo $user['email']; ?></p>

<?php include "../templates/footer.php"; ?>