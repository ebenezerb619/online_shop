<?php include "../config/db.php"; ?>

<?php

if(isset($_POST['register'])){

$fullname = trim($_POST['fullname']);
$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];

if($fullname && $email && $password){
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $stmt = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param('sss', $fullname, $email, $hash);

  if($stmt->execute()){
    set_flash('success', 'Registration successful. You can now log in.');
    header("Location: register.php");
    exit;
  } else {
    set_flash('error', 'Registration failed. Please try again.');
    header("Location: register.php");
    exit;
  }
} else {
  set_flash('error', 'Please fill in all fields with valid values.');
  header("Location: register.php");
  exit;
}

}

?>

<?php include "../templates/header.php"; ?>

<div class="center-box">
  <div class="card" style="max-width:420px; width:100%;">
    <div class="card-body">
      <h2>Register</h2>

      <form method="POST">

        <input type="text" name="fullname" placeholder="Full Name" required>

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button name="register">Register</button>

      </form>

      <p style="margin-top:12px; font-size:0.9rem;">Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>