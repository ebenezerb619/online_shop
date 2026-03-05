<?php include "../config/db.php"; ?>
<?php include "../templates/header.php"; ?>

<?php

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$result=$conn->query("SELECT * FROM users WHERE email='$email'");

$user=$result->fetch_assoc();

if($user && password_verify($password,$user['password'])){

$_SESSION['user_id']=$user['id'];

header("Location: ../user/dashboard.php");

}

else{

echo "Invalid login";

}

}

?>

<h2>Login</h2>

<form method="POST">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button name="login">Login</button>

</form>

<?php include "../templates/footer.php"; ?>