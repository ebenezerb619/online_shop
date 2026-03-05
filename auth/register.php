<?php include "../config/db.php"; ?>
<?php include "../templates/header.php"; ?>

<?php

if(isset($_POST['register'])){

$fullname=$_POST['fullname'];
$email=$_POST['email'];

$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$sql="INSERT INTO users(fullname,email,password)
VALUES('$fullname','$email','$password')";

if($conn->query($sql)){

echo "<p>Registration successful</p>";

}

}

?>

<h2>Register</h2>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>

</form>

<?php include "../templates/footer.php"; ?>