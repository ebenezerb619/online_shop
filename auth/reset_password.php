<?php include "../config/db.php"; ?>
<?php include "../templates/header.php"; ?>

<h2>Reset Password</h2>

<form method="POST">

<input type="email" name="email" placeholder="Enter your email" required>

<input type="password" name="new_password" placeholder="Enter new password" required>

<button name="reset">Reset Password</button>

</form>

<?php

if(isset($_POST['reset'])){

$email=$_POST['email'];

$newpassword=password_hash($_POST['new_password'], PASSWORD_DEFAULT);

$result=$conn->query("SELECT * FROM users WHERE email='$email'");

if($result->num_rows > 0){

$conn->query("UPDATE users SET password='$newpassword' WHERE email='$email'");

echo "<p>Password updated successfully</p>";

}else{

echo "<p>Email not found</p>";

}

}

?>

<?php include "../templates/footer.php"; ?>