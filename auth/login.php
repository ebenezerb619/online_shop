<?php include "../config/db.php"; ?>

<?php

if(isset($_POST['login'])){

$email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
$password = $_POST['password'];

if($email){
  $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
  $stmt->bind_param('s', $email);
  $stmt->execute();
  $result = $stmt->get_result();
  $user = $result->fetch_assoc();

  if($user && password_verify($password, $user['password'])){
    $_SESSION['user_id'] = $user['id'];
    header("Location: ../user/dashboard.php");
    exit;
  }
}

set_flash('error', 'Invalid email or password.');
header("Location: login.php");
exit;

}

?>

<?php include "../templates/header.php"; ?>

<div class="center-box">
  <div class="card" style="max-width:420px; width:100%;">
    <div class="card-body">
      <h2>Login</h2>

      <form method="POST">

        <input type="email" name="email" placeholder="Email" required>

        <input type="password" name="password" placeholder="Password" required>

        <button name="login">Login</button>
      </form>

      <a class="forgot" href="reset_password.php">Forgot password?</a>
      <p style="margin-top:12px; font-size:0.9rem;">Don't have an account? <a href="register.php">Register</a></p>
    </div>
  </div>
</div>

<?php include "../templates/footer.php"; ?>